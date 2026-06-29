@extends('adminlte::page')

@section('template_title')
    {{ $activo->name ?? __('Detalles') . " de " . __('Activo') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-dark" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles') }} de Activo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('activos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo:</strong>
                                    {{ $activo->codigo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $activo->descrip }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:</strong>
                                    {{ $activo->precio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Adquisicion:</strong>
                                    {{ $activo->fadquisicion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Foto:</strong><br>
                                    <img src="{{ asset('storage/' . $activo->foto) }}" width="150">
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $activo->estado->descrip }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Grupo:</strong>
                                    {{ $activo->grupo->descrip }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Oficina:</strong>
                                    {{ $activo->oficina->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Responsable:</strong>
                                    {{ $activo->responsable->nombre}}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <img src="{{ asset('storage/' . $activo->responsable->foto) }}" width="80">
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
