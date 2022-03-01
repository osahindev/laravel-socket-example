<div class="row mt-3">
    <label for="{{ $id }}" class="col-sm-3 col-form-label">{{ $labelText }}</label>
    <div class="col-sm-9">
        <input type="{{ $inputType }}" name="{{ $name }}" @if($placeholderText != null) placeholder="{{ $placeholderText }}" @endif class="form-control @if($errors->has($name)) is-invalid @endif " id="{{ $id }}" value="{{ old($name) ?? $value ?? '' }}" >
        @if($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>
