<!DOCTYPE html>
<html>
<head>
    <title>Activos Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;font-size: 12px; }
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
                <th >Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activos as $activo)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $activo->codigo }}</td>
                <td>{{ $activo->descrip }}</td>
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
