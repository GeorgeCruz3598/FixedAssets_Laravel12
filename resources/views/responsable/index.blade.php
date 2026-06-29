@extends('adminlte::page')

@section('template_title')
    Responsables
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Responsables') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('responsables.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Ci</th>
									<th >Nombre</th>
									<th >Foto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($responsables as $responsable)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $responsable->ci }}</td>
										<td >{{ $responsable->nombre }}</td>
										<td ><img src="{{ asset('storage/' . $responsable->foto) }}" width="90"></td>
                        
                                            <td>
                                                <form action="{{ route('responsables.destroy', $responsable->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('responsables.show', $responsable->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('responsables.edit', $responsable->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $responsables->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
