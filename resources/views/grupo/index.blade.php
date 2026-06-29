@extends('adminlte::page')

@section('template_title')
    Grupos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grupos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('grupos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Descripcion</th>
									<th >Vida Util</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $grupo->descrip }}</td>
										<td >{{ $grupo->vidautil }}</td>

                                            <td>
                                                <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('grupos.show', $grupo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('grupos.edit', $grupo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $grupos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
