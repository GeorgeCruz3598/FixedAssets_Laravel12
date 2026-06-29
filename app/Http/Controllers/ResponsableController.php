<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ResponsableRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;  // added

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

        return Redirect::route('responsables.index')
            ->with('success', 'Responsable updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Responsable::find($id)->delete();

        return Redirect::route('responsables.index')
            ->with('success', 'Responsable deleted successfully');
    }
}
