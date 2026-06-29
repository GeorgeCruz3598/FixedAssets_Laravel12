@extends('adminlte::page')

@section('template_title')
    {{ __('Editar') }} Grupo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header text-white bg-dark">
                        <span class="card-title">{{ __('Editar') }} Grupo</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('grupos.update', $grupo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('grupo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
