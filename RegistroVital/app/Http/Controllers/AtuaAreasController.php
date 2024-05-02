<?php

namespace App\Http\Controllers;

use App\Models\AtuaArea;
use Illuminate\Http\Request;

class AtuaAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atuaareas = AtuaArea::with('especializacoes')->get();
        return view('Cadastros/listaatuaareas', compact('atuaareas'), ['atuaareas' => $atuaareas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AtuaArea::create($request->all());
        return redirect()->route('atuaareas-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Cadastros/cadastroatuaareas');
    }

    /**
     * Display the specified resource.
     */
    public function show(AtuaArea $atuaArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $atuaarea = AtuaArea::find($id);
        return view('Cadastros/editaratuaarea', compact('atuaarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $atuaarea = AtuaArea::findorfail($id);
        $atuaarea->update($request->all());
        return redirect()->route('atuaareas-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $atuaarea = AtuaArea::findorfail($id);
        $atuaarea->delete();
        return redirect()->route('atuaareas-index');
    }
}
