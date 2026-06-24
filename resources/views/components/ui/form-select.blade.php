@props([
    'label',
    'name',
    'required' => false,
    'options' => [],
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
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        @if ($required) required @endif
        @class(['form-input', 'form-input-error' => $errors->has($name)])
    >
        @if ($placeholder)
            <option value="" disabled @selected(old($name, $value) === '')>{{ $placeholder }}</option>
        @endif
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @selected(old($name, $value) === (string) $optionValue)>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
