<?php

namespace App\Http\Controllers;

use App\Models\Carrousel;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Throwable;

class CarruselController extends Controller
{
    public function create()
    {
        $subcategorias = Subcategory::orderBy('created_at', 'desc')->get();
        return view('carrusel.create', compact('subcategorias'));
    }

    public function store(Request $request)
    {

        try {
            $subcategoria = Subcategory::find($request->subcategory);
            if ($request->hasFile('photo')) {
                $imagen['photo'] = $request->file('photo')->store('uploads/carrusel/' . $subcategoria->slug, 'public');
                $foto  = new Carrousel();
                $foto->subcategory_id = $request->subcategory;
                $foto->url = $imagen['photo'];
                $foto->save();
            }
            return redirect()->route('carrusel.create')->with('success', '¡La imagen del carrusel con el enlace a la subcategoría "' . $subcategoria->name . '" se ha insertado correctamente!');
        } catch (Throwable $mensaje) {

            abort(403, 'Bad Request');
        }
    }

    public function index()
    {
        $carruseles = Carrousel::paginate(12);
        return view('carrusel.index', compact('carruseles'));
    }
    public function destroy(Carrousel $carrusel)
    {
        try {
            $carrusel->delete();
            return redirect()->route('carrusel.index')->with('success', 'El carrusel con el id "' . $carrusel->id . '" se ha eliminado correctamente!');
        } catch (\Throwable $th) {
            abort(403, 'Bad Request');
        }
    }
}
