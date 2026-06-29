@extends('adminlte::page')

@section('template_title')
    Activos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <strong>Lista de {{ __('Activos') }}</strong>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('activos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Codigo</th>
									<th >Descripcion</th>
									<th >Precio</th>
									<th >Fecha Adquisicion</th>
									
									<th >Estado</th>
									<th >Grupo</th>
									<th >Oficina</th>
									<th >Responsables</th>

                                    <th >Foto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activos as $activo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $activo->codigo }}</td>
										<td >{{ $activo->descrip }}</td>
										<td >{{ $activo->precio }}</td>
										<td >{{ $activo->fadquisicion }}</td>

										<td >{{ $activo->estado->descrip }}</td>
										<td >{{ $activo->grupo->descrip }}</td>
										<td >{{ $activo->oficina->nombre}}</td>
										<td >{{ $activo->responsable->nombre }}</td>

                                        <td ><img src="{{ asset('storage/' . $activo->foto) }}" width="90"></td>       

                                            <td>
                                                <form action="{{ route('activos.destroy', $activo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('activos.show', $activo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Detalles') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('activos.edit', $activo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $activos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
