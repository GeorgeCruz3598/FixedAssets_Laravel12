<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Etiquetas de Activos</title>
    <style>
        body {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }
        .label-container {
            width: 70%;
            border: 2px solid #333;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 10px;
            page-break-inside: avoid; /* Prevents a label from splitting across two pages */
        }
        .label-table {
            width: 100%;
            border-collapse: collapse;
        }
        .label-table td {
            vertical-align: top;
        }
        .qr-cell {
            width: 110px;
        }
        .qr-cell img {
            width: 100px;
            height: 100px;
        }
        .info-cell {
            padding-left: 10px;
            padding-top: 5px;
            line-height: 1.4;
        }
        .codigo-text {
            font-weight: bold;
            font-size: 16px;
        }
        .logo-cell {
            width: 60px;
            text-align: right;
        }
        /* Placeholder for the top-right logo shown in your image */
        .logo-circle {
            display: inline-block;
            width: 45px;
            height: 45px;
            border: 2px solid #333;
            border-radius: 50%;
            text-align: center;
            line-height: 45px;
            font-weight: bold;
            font-size: 18px;
            letter-spacing: -1px;
        }
    </style>

    
</head>
<body>
    @foreach($activos as $activo)
        @php
            // 1. Structure the data for the QR code
            $qrData = "Código: {$activo->codigo} | Descrip: {$activo->descrip} | Oficina: {$activo->oficina->nombre} | Fecha Adquisicion: {$activo->fadquisicion}";
            
            // 2. Generate QR code as SVG, then encode to base64 for safe DOMPDF rendering
            $qrCodeSvg = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)
                            ->margin(0)
                            ->generate($qrData);
            $base64Qr = base64_encode($qrCodeSvg);
        @endphp

        <div class="label-container">
            <table class="label-table">
                <tr>
                    <td class="qr-cell">
                        <img src="data:image/svg+xml;base64,{{ $base64Qr }}" alt="QR Code">
                    </td>
                    
                    <td class="info-cell">
                        <div class="codigo-text">{{ $activo->codigo }}</div>
                        <div>ACTIVO FIJO</div> <div>{{ mb_strtoupper($activo->descrip) }}</div>
                        <div>{{ mb_strtoupper($activo->grupo->descrip) }}</div>
                    </td>
                
                    <td class="logo-cell">
                        <div  class="logo-circle">
                           <img src="vendor/adminlte/dist/img/AdminLTELogo.png" 
                            style="width: 52px;height: 48px;" alt="SE">   
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    @endforeach

</body>
</html>