<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="descrip" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descrip" class="form-control @error('descrip') is-invalid @enderror" value="{{ old('descrip', $estado?->descrip) }}" id="descrip" placeholder="Descripcion">
            {!! $errors->first('descrip', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>