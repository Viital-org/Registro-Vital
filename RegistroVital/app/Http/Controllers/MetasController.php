<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metas = Meta::with('pacientes')->simplePaginate(5);
        return view('Cadastros/listametas', compact('metas'), ['metas' => $metas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Meta::create($request->all());
        return redirect()->route('metas-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cadastros/cadastrometas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('search_id');

        if ($id === null) {
            $metas = Meta::query()->paginate(5);
        } else {
            $metas = Meta::where('id', $id)->paginate(5);
        }

        return view('Cadastros/listametas', ['metas' => $metas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $meta = Meta::find($id);
        return view('Cadastros/editarmeta', compact('meta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $meta = Meta::findorfail($id);
        $meta->update($request->all());
        return redirect()->route('metas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $meta = Meta::findorfail($id);
        $meta->delete();
        return redirect()->route('metas.index');
    }
}
