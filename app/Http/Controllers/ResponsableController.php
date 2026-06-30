<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ResponsableRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;  // added

//Added for Reports
use Barryvdh\DomPDF\Facade\Pdf;
// sweetalert
use Alert;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $responsables = Responsable::paginate();

        return view('responsable.index', compact('responsables'))
            ->with('i', ($request->input('page', 1) - 1) * $responsables->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sw = False;
        $responsable = new Responsable();

        return view('responsable.create', compact('responsable','sw'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResponsableRequest $request): RedirectResponse
    {
        $ruta_imagen = $request->file('foto')->store('responsables','public');

        Responsable::create ([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'foto' => $ruta_imagen,
        ]);
        alert()->success('Exito!', 'El responsable ha sido creado.');
        return Redirect::route('responsables.index')
            ->with('success', 'Responsable created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        
        $responsable = Responsable::find($id);

        return view('responsable.show', compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {   
        $sw = True;
        $responsable = Responsable::find($id);

        return view('responsable.edit', compact('responsable','sw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResponsableRequest $request, Responsable $responsable): RedirectResponse
    {
        //$responsable->update($request->validated());
        $data = $request->validated();
        if ($request->hasFile('foto')){
            //delete old foto
            if ($responsable->foto && Storage::disk('public')->exists($responsable->foto)){
                Storage::disk('public')->delete($responsable->foto);
            }
            //store new foto
            $data['foto'] = $request->file('foto')->store('responsables','public');
        }

        $responsable->update($data);
        alert()->success('Exito!', 'El responsable ha sido actualizado.');
        return Redirect::route('responsables.index')
            ->with('success', 'Responsable updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Responsable::find($id)->delete();
        alert()->success('Exito!', 'El responsable ha sido eliminado.');

        return Redirect::route('responsables.index')
            ->with('success', 'Responsable deleted successfully');
    }

    // for report
    public function listpdf()
    {
        //dd("test OK");
        $i = 0;
        $responsables = Responsable::all();
        //carga vista
                            //folder.view         
        $pdf = Pdf::loadView('responsable.responsablespdf', compact('responsables','i'));
        //vista en el navegador
        return $pdf->stream('doc_responsables.pdf');
        //descarga del pdf
        //return $pdf->download('doc_responsables.pdf');
        
    }
   
}
