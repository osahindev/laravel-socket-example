<div class="row mt-3">
    <label for="{{ $id }}" class="col-sm-3 col-form-label">{{ $labelText }}</label>
    <div class="col-sm-9">
        <select name="{{ $name }}" id="{{ $id }}" class="form-control  @if($errors->has($name)) is-invalid @endif ">
            @isset($placeholderText)
                <option value="">{{ $placeholderText }}</option>
            @endisset

            @foreach($options as $optionValue => $optionText)
                    <option value="{{ $optionValue }}">{{ $optionText }}</option>
                @endforeach
        </select>
        @if($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>
