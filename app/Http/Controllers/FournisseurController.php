<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Fournisseur::latest()->get();
        return view('fournisseurs.index', compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:6',
            'email' => 'required|email',
            "phone" => "required",
            "adresse" => "required",
            "categorie" => "required"
        ]);
        Fournisseur::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "adresse" => $request->adresse,
            "categorie" => $request->categorie,
            "email" => $request->email,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::find($id);
        return view('fournisseurs.edit', compact("fournisseur"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fournisseur = Fournisseur::find($id);
        $this->validate($request, [
            'name' => 'required|min:6',
            'email' => 'required|email',
            "phone" => "required",
            "adresse" => "required",
            "categorie" => "required"
        ]);
        $fournisseur->update([
            "name" => $request->name,
            "phone" => $request->phone,
            "adresse" => $request->adresse,
            "categorie" => $request->categorie,
            "email" => $request->email,
        ]);
        return redirect()->route('fournisseur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fournisseur::find($id)->delete();
        return redirect()->back();
    }

    public function SwitchActiveMode($id)
    {
        $fournisseur = Fournisseur::find($id);
        $fournisseur->update([
            "statue" => !$fournisseur->statue
        ]);
        return redirect()->back();
    }
}
