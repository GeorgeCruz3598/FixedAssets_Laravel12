<!DOCTYPE html>
<html>
<head>
    <title>Activos Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 5px; text-align: left; font-size: 10px; }
        img { max-width: 100px; height: auto; }
    </style>
</head>
<body>
    <h2>Lista general de Activos Fijos</h2>
    <table>
        <thead class="thead">
            <tr>
                <th>No</th>                   
                <th >Codigo</th>
                <th >Descripcion</th>
                <th >Precio</th>
                <th >Fecha Compra</th>
                <th >Estado</th>
                <th >Grupo</th>
                <th >Oficina</th>
                <th >Responsable</th>
                <th >Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activos as $activo)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $activo->codigo }}</td>
                <td>{{ $activo->descrip }}</td>
                <td>{{ $activo->precio }}</td>
                <td>{{ $activo->fadquisicion }}</td>
                <td >{{ $activo->estado->descrip }}</td>
                <td >{{ $activo->grupo->descrip }}</td>
                <td >{{ $activo->oficina->nombre}}</td>
                <td >{{ $activo->responsable->nombre }}</td>  
                <td>
                    
                    @if($activo ->foto)

                        <img src="{{ public_path('storage/'.$activo->foto) }}" width="60" height="60" alt="Foto">
                            
                    @endif
                </td>       
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
