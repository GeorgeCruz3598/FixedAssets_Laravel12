@extends('adminlte::page')

@section('template_title')
    {{ __('Editar') }} Activo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header text-white bg-dark">
                        <span class="card-title">{{ __('Editar') }} Activo</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('activos.update', $activo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('activo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
