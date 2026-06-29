@extends('adminlte::page')

@section('template_title')
    {{ __('Nuevo') }} Responsable
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header text-white bg-dark">
                        <span class="card-title">{{ __('Nuevo') }} Responsable</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('responsables.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('responsable.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
