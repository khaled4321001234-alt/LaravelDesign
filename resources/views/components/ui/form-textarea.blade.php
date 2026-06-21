@props([
    'label',
    'name',
    'required' => false,
    'placeholder' => '',
    'rows' => 5,
    'value' => '',
])

<div>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
        @if ($required)
            <span class="text-primary">*</span>
        @endif
    </label>
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        @if ($required) required @endif
        placeholder="{{ $placeholder }}"
        @class(['form-input resize-none', 'form-input-error' => $errors->has($name)])
    >{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
