<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Assignation;
use App\Models\Fonction;
use App\Models\User;

class AssignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignations = Assignation::all();
        $users = User::all();
        $fonctions = Fonction::all();

        return view('admin.assignations.index', compact('assignations','users', 'fonctions'));
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
        $assignation = $request->validate([
            'user_id' => ['required', 'integer'],
            'fonction_id' => ['required', 'integer'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
        ]);

        Assignation::create($assignation);

        return back()->with('toast_success', 'Assignation bien effectuée');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Assignation $assignation)
    {
        $nom_complet = $assignation->user->name;
        $fonction = $assignation->fonction->libelle;

        $assignation->delete();
        return back()->with('success', "Assignation de l\'opérateur '$nom_complet' à la fonction '$fonction' supprimée avec succès !");
    }
}
