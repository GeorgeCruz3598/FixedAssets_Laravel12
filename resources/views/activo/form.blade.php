<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="codigo" class="form-label">{{ __('Codigo') }}</label>
            <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $activo?->codigo) }}" id="codigo" placeholder="Codigo">
            {!! $errors->first('codigo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descrip" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descrip" class="form-control @error('descrip') is-invalid @enderror" value="{{ old('descrip', $activo?->descrip) }}" id="descrip" placeholder="Descripcion">
            {!! $errors->first('descrip', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $activo?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fadquisicion" class="form-label">{{ __('Fecha Adquisicion') }}</label>
            <input type="date" name="fadquisicion" class="form-control @error('fadquisicion') is-invalid @enderror" value="{{ old('fadquisicion', $activo?->fadquisicion) }}" id="fadquisicion" placeholder="fecha de adquisicion">
            {!! $errors->first('fadquisicion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="foto" class="form-label">{{ __('Foto del Activo') }}</label>
            @if($sw)
                <img src="{{ asset('storage/' . $activo->foto) }}" width="120" style="padding-bottom: 20px;">
            @endif
            <input type="file" name="foto" accept="image/*" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto', $activo?->foto) }}" id="foto" placeholder="Foto del activo">
            {!! $errors->first('foto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="estados_id" class="form-label">{{ __('Estado') }}</label>
            <select name="estados_id" id="estados_id" class="form-control @error('estados_id') is-invalid @enderror">
            @foreach ($estados as $e)
                <option value="{{$e->id}}">{{$e->descrip}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="grupos_id" class="form-label">{{ __('Grupo') }}</label>
            <select name="grupos_id" id="grupos_id" class="form-control @error('grupos_id') is-invalid @enderror">
            @foreach ($grupos as $g)
                <option value="{{$g->id}}">{{$g->descrip}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="oficinas_id" class="form-label">{{ __('Oficina') }}</label>
            <select name="oficinas_id" id="oficinas_id" class="form-control @error('oficinas_id') is-invalid @enderror">
            @foreach ($oficinas as $o)
                <option value="{{$o->id}}">{{$o->nombre}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="responsables_id" class="form-label">{{ __('Responsable') }}</label>
            <select name="responsables_id" id="responsables_id" class="form-control @error('responsables_id') is-invalid @enderror">
            @foreach ($responsables as $r)
                <option value="{{$r->id}}">{{$r->nombre}}</option>
            @endforeach         
            </select>
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>