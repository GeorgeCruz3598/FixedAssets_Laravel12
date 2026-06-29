@extends('adminlte::page')
@section('template_title')
    {{ $estado->name ?? __('Detalles') . " de " . __('Estado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-dark" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles') }} de Estado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('estados.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $estado->descrip }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
