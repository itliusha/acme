<?php

namespace Itliusha\Acme;

use Illuminate\View\Compilers\ComponentTagCompiler;

class AcmeTagCompiler extends ComponentTagCompiler
{
    public function componentString(string $component, array $attributes): string
    {
        // 将组件的 data, attributes, slots 抓发给另一个组件
        if ($component === 'acme::delegate-component') {
            $component = $attributes['component'];

            $class = \Illuminate\View\AnonymousComponent::class;

            return "##BEGIN-COMPONENT-CLASS##@component('{$class}', 'acme::' . {$component}, [
    'view' => md5('acme') . '::' . {$component},
    'data' => \$__env->getCurrentComponentData(),
])
<?php \$component->withAttributes(\$attributes->getAttributes()); ?>";
        }

        return parent::componentString($component, $attributes);
    }

    /**
     * 编译标签开头标记
     *
     * @param  string  $value
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    protected function compileOpeningTags(string $value): string
    {
        $pattern = "/
            <
                \s*
                acme[\:]([\w\-\:\.]*)
                (?<attributes>
                    (?:
                        \s+
                        (?:
                            (?:
                                @(?:class)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                @(?:style)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                \{\{\s*\\\$attributes(?:[^}]+?)?\s*\}\}
                            )
                            |
                            (?:
                                (\:\\\$)(\w+)
                            )
                            |
                            (?:
                                [\w\-:.@%]+
                                (
                                    =
                                    (?:
                                        \\\"[^\\\"]*\\\"
                                        |
                                        \'[^\']*\'
                                        |
                                        [^\'\\\"=<>]+
                                    )
                                )?
                            )
                        )
                    )*
                    \s*
                )
                (?<![\/=\-])
            >
        /x";

        return preg_replace_callback($pattern, function (array $matches) {
            $this->boundAttributes = [];

            $attributes = $this->getAttributesFromAttributeString($matches['attributes']);

            return $this->componentString('acme::'.$matches[1], $attributes);
        }, $value);
    }

    /**
     * 编译自闭合标签
     *
     * @param  string  $value
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    protected function compileSelfClosingTags(string $value): string
    {
        $pattern = "/
            <
                \s*
                acme[\:]([\w\-\:\.]*)
                \s*
                (?<attributes>
                    (?:
                        \s+
                        (?:
                            (?:
                                @(?:class)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                @(?:style)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                \{\{\s*\\\$attributes(?:[^}]+?)?\s*\}\}
                            )
                            |
                            (?:
                                (\:\\\$)(\w+)
                            )
                            |
                            (?:
                                [\w\-:.@%]+
                                (
                                    =
                                    (?:
                                        \\\"[^\\\"]*\\\"
                                        |
                                        \'[^\']*\'
                                        |
                                        [^\'\\\"=<>]+
                                    )
                                )?
                            )
                        )
                    )*
                    \s*
                )
            \/>
        /x";

        return preg_replace_callback($pattern, function (array $matches) {
            $this->boundAttributes = [];

            $attributes = $this->getAttributesFromAttributeString($matches['attributes']);

            // Support inline "slot" attributes...
            if (isset($attributes['slot'])) {
                $slot = $attributes['slot'];

                unset($attributes['slot']);

                return '@slot('.$slot.') ' . $this->componentString('acme::'.$matches[1], $attributes)."\n@endComponentClass##END-COMPONENT-CLASS##" . ' @endslot';
            }

            return $this->componentString('acme::'.$matches[1], $attributes)."\n@endComponentClass##END-COMPONENT-CLASS##";
        }, $value);
    }

    /**
     * 编译标签结束标记
     *
     * @param  string  $value
     * @return string
     */
    protected function compileClosingTags(string $value): string
    {
        return preg_replace("/<\/\s*acme[\:][\w\-\:\.]*\s*>/", ' @endComponentClass##END-COMPONENT-CLASS##', $value);
    }
}
