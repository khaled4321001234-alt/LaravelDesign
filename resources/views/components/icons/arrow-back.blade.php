@props(['class' => 'size-6'])

<x-icons.arrow-left {{ $attributes->merge(['class' => $class . ' rtl:rotate-180']) }} />
