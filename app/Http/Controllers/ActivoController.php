<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ActivoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

// added for update
use Illuminate\Support\Facades\Storage;  

//Added for selector
use App\Models\Grupo;
use App\Models\Oficina;
use App\Models\Responsable;
use App\Models\Estado;

//Added for Reports
use Barryvdh\DomPDF\Facade\Pdf;

//sweetalert
use Alert;

class ActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $activos = Activo::paginate();

        return view('activo.index', compact('activos'))
            ->with('i', ($request->input('page', 1) - 1) * $activos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sw = False;
        $activo = new Activo();

        //create models of strong entities for selectors
        $grupos = Grupo::All();
        $oficinas = Oficina::All();
        $responsables = Responsable::All();
        $estados = Estado::All();
        return view('activo.create', compact('activo','sw','grupos','oficinas','responsables','estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivoRequest $request): RedirectResponse
    {
        $ruta_imagen = $request->file('foto')->store('activos','public');

        // to save image in a customized location
        Activo::create ([
            'codigo' => $request->codigo,
            'descrip' => $request->descrip,
            'precio' => $request->precio,
            'fadquisicion' => $request->fadquisicion,
            'foto' => $ruta_imagen,
            'estados_id' => $request->estados_id,
            'grupos_id' => $request->grupos_id,
            'oficinas_id' => $request->oficinas_id,
            'responsables_id' => $request->responsables_id,
        ]);
        alert()->success('Exito!', 'El activo ha sido creado.');
        return Redirect::route('activos.index')
            ->with('success', 'Activo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $activo = Activo::find($id);

        return view('activo.show', compact('activo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sw = True;
        $activo = Activo::find($id);
        
        //create models of strong entities or selector
        $grupos = Grupo::All();
        $oficinas = Oficina::All();
        $responsables = Responsable::All();
        $estados = Estado::All();

        return view('activo.edit', compact('activo','sw','grupos','oficinas','responsables','estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivoRequest $request, Activo $activo): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('foto')){
            //delete old foto
            if ($activo->foto && Storage::disk('public')->exists($activo->foto)){
                Storage::disk('public')->delete($activo->foto);
            }
            //store new foto
            $data['foto'] = $request->file('foto')->store('activos','public');
        }

        $activo->update($data);
        alert()->success('Exito!', 'El activo ha sido actualizado.');

        return Redirect::route('activos.index')
            ->with('success', 'Activo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Activo::find($id)->delete();

        alert()->success('Exito!', 'El activo ha sido eliminado.');
        return Redirect::route('activos.index')
            ->with('success', 'Activo deleted successfully');
    }

    // for report
    public function listpdf()
    {
        //dd("test OK");
        $i = 0;
        $activos = Activo::all();
        //carga vista
                            //folder.view         
        $pdf = Pdf::loadView('activo.activospdf', compact('activos','i'));
        //vista en el navegador
        return $pdf->stream('doc_activos.pdf');
        //descarga del pdf
        //return $pdf->download('doc_activos.pdf');
        
    }
    public function detallepdf()
    {
        //dd("test OK");
        $i = 0;
        $activos = Activo::all();
        //carga vista
                            //folder.view         
        $pdf = Pdf::loadView('activo.activosdetallepdf', compact('activos','i'));
        //vista en el navegador
        return $pdf->stream('doc_activos_detalle.pdf');
        //descarga del pdf
        //return $pdf->download('doc_activos.pdf');
    }

    //print qr activos
    public function print_qr()
    {
        $activos = Activo::all();

        // Load the view and pass the data
        //printactivos_qr is the blade view that will be used to generate the PDF
        $pdf = Pdf::loadView('activo.printactivos_qr', compact('activos'));

        // Output the PDF to the browser
        //activos_qr is the name of the PDF file that will be generated
        return $pdf->stream('activos_qr.pdf');
    }

}
