<!DOCTYPE html>
<html>
<head>
    <title>Responsables Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;font-size: 12px; }
        img { max-width: 100px; height: auto; }
    </style>
</head>
<body>
    <h2>Lista general de Responsables</h2>
    <table>
        <thead class="thead">
            <tr>
                <th>No</th>    
                <th >Nombre</th>
                <th >Ci</th>
                <th >Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responsables as $responsable)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $responsable->nombre }}</td>
                <td>{{ $responsable->ci }}</td>
                <td>
                    @if($responsable ->foto)
                        <img src="{{ public_path('storage/'.$responsable->foto) }}" width="60" height="60" alt="Foto">   
                    @endif
                </td>       
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
