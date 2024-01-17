
<div class="form-group my-2">
    <label for="{{ $id }}" class="form-label {{ $labelClass ?? null }}">{{ $name }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control {{ $inputStyle ?? null }}" id="{{ $id }}"
        name="{{ $id }}" value="{{ $value ?? null }}">
</div>
