@props(['label', 'icon', 'id', 'type', 'placeholder' => ''])

<div class="mb-4">
    <label for="{{ $id }}">{{ $label }}</label>
    <div class="position-relative">
        <div class="input-icon">
            <i class="{{ $icon }}"></i>
        </div>
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}"
            placeholder="{{ $placeholder }}" value="{{ old($id) }}" autocomplete="off">
        @error($id)
            <small class="text-sm text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
