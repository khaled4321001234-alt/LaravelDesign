@props(['class' => 'size-6'])

<x-icons.arrow-right {{ $attributes->merge(['class' => $class . ' rtl:rotate-180']) }} />
