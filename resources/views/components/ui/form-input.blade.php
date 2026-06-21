@props([
    'label',
    'name',
    'type' => 'text',
    'required' => false,
    'placeholder' => '',
    'value' => '',
])

<div>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
        @if ($required)
            <span class="text-primary">*</span>
        @endif
    </label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if ($required) required @endif
        placeholder="{{ $placeholder }}"
        @class(['form-input', 'form-input-error' => $errors->has($name)])
    >
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
