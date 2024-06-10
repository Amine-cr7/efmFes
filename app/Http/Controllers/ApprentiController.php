<?php

namespace App\Http\Controllers;

use App\Models\Apprenti;
use Illuminate\Http\Request;

class ApprentiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apprentis = Apprenti::paginate(10);
        // return view('index',compact('apprentis'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'prenom' => 'required|alpha',
            'nom' => 'required|alpha',
            'email' => 'required|email',
            'addresse' => 'min:12|max:200',
        ]);
        $apprenti = new Apprenti;
        $apprenti->nom = $data['nom'];
        $apprenti->prenom = $data['prenom'];
        $apprenti->email = $data['email'];
        $apprenti->date_naissance = $request['date_naissance'];
        $apprenti->addresse = $data['addresse'];
        $apprenti->ville = $request['ville'];
        $path = $request['photo']->store('images','public');
        $apprenti->photo = $path;
        $apprenti->save();
        return redirect('/apprentis');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apprenti $apprenti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apprenti $apprenti)
    {
        //
    }
    public function getApprentiByVille($ville){
        $apprentis = Apprenti::where('ville',$ville)->get();
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apprenti $apprenti)
    {
        $data = $request->validate([
            'prenom' => 'required|alpha',
            'nom' => 'required|alpha',
            'email' => 'required|email',
            'addresse' => 'min:12|max:200',
        ]);
        $apprenti->nom = $data['nom'];
        $apprenti->prenom = $data['prenom'];
        $apprenti->email = $data['email'];
        $apprenti->date_naissance = $request['date_naissance'];
        $apprenti->addresse = $data['addresse'];
        $apprenti->ville = $request['ville'];
        if($request->hasFile('image')){
            $path = $request['photo']->store('images','public');
            $apprenti->photo = $path ; 
        }
        $apprenti->save();
        // return redirect('/apprentis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apprenti $apprenti)
    {
        $apprenti->artisans()->detach();
        $apprenti->delete();
    }
}
