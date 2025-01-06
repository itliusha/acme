
{{--{{ dd($slot->isNotEmpty()) }}--}}
@php
    $sizeClass = match ($size) {
        'mini' => 'w-6 h-6 text-sm',
        'small' => 'w-8 h-8 text-lg',
        'medium' => 'w-16 h-16 text-4xl',
        'large' => 'w-20 h-20 text-5xl',
        'maximum' => 'w-36 h-36 text-7xl',
        default => "w-12 h-12 text-2xl"
    };
    $roundedClass = match ($shape) {
        'circle' => 'rounded-full',
        'square' => match ($size) {
            'mini' ,'small' => 'rounded',
            'medium', 'large' => 'rounded-lg',
            'maximum' => 'rounded-xl',
            default => "rounded-md"
        }
    };

    $numberSize = (fn($val) => is_integer($val) ? ["width:{$size}px; height:{$size}px;"] : null)($size);
@endphp

<div @class([ 'relative', $sizeClass])>
    <div {{ $attributes->class([
        'flex justify-center items-center h-full border overflow-hidden shadow-sm dark:bg-gray-700 dark:border-gray-600',
        'border-gray-50' => $type === 'image',
        $roundedClass,
        match ($size) {
            'medium' => 'border-2',
            'large' => 'border-[3px]',
            'maximum' => 'border-4',
            default =>  "border-[1.5px]"
        },
        match ($theme) {
                    'primary' => 'bg-primary-100 border-primary-200 text-primary-600',
                    'success' => 'bg-success-100 border-success-200 text-success-600',
                    'warning' => 'bg-warning-100 border-warning-200 text-warning-600',
                    'danger' => 'bg-danger-100 border-danger-200 text-danger-600',
                    'subsidiary' => 'bg-subsidiary-100 border-subsidiary-200 text-subsidiary-600',
                    default => 'bg-gray-50 border-gray-100 text-gray-400'
                } => $type !== 'image'
    ])->style($numberSize) }} >
        @if($slot->isEmpty())
            @if($type === 'image')
                <img class="w-full h-full" src="{{ $src }}" alt="{{ $alt }}">
            @elseif($type === 'icon')
                {{ $icon }}
            @elseif($type === 'text')
                <span>
                    {{ $text }}
                </span>
            @endif
        @else
            {{ $slot }}
        @endif

    </div>
    @if($dot)
        <div @class([
            match ($size) {
                'mini' => 'w-2 h-2',
                'small' => 'w-2.5 h-2.5',
                'medium' => 'w-4 h-4 border-2',
                'large' => 'w-5 h-5 border-[2.5px]',
                'maximum' => 'w-7 h-7 border-[3px]',
                default => 'w-3 h-3 border-[1.5px]'
            },
            '-top-[10%] -right-[8%]' => $shape === 'square',
            'top-[3%] right-[2.5%]' => $shape === 'circle',
            'block absolute rounded-full border border-white dark:border-warning-200 bg-warning-600'
        ])></div>
    @endif
</div>