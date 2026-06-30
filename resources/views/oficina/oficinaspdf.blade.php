<!DOCTYPE html>
<html>
<head>
    <title>Oficinas Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left;font-size: 12px; }
        img { max-width: 100px; height: auto; }
    </style>
</head>
<body>
    <h2>Lista general de Oficinas</h2>
    <table style="margin: auto;">
        <thead class="thead">
            <tr>
                <th>No</th>    
                <th >Nombre</th>
        
            </tr>
        </thead>
        <tbody>
            @foreach ($oficinas as $oficina)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $oficina->nombre }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
