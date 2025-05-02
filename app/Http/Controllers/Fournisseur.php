<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class Fournisseur extends Controller
{
    //

    public function insert_fournisseurs(Request $request){
        $user = Auth::user();
        $boutique = Session::get('boutique_active');
        $messages = [
            'name.unique'=>'changez ce nom il existe deja',
            'name.required'=>'veuillez remplir la case de nom de fournisseur',
            'name.regex'=>' pas de chiffres dans le nom uniquement des lettres',
            'email_fournisseur.required'=>' le champ de l\'email doit etre rempli',
            'email_fournisseur.unique' => 'changez ce mail il existe deja',
            'email_fournisseur.regex' => 'entrez un mail valide',
            'contact_fournisseur.required' => 'veuillez remplir la case de contact fournisseur',
            'contact_fournisseur.unique'=> 'changez le contact du fournisseur , il existe deja',
            'contact_fournisseur.regex' => 'veuillez entrer un contact valide',
        ];


        $request->validate([
            'nom_fournisseur' => 'required|string|max:255|unique:users, nom_fournisseur|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_fournisseur' => 'required|string|max:255|unique:users,email_fournisseur|regex: /^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact_fournisseur' => 'required|string|max:255|unique:users,contact_fournisseur|regex:/^\+?[1-9]\d{6,14}$/',
            'pays' => 'required',
        ], $messages);

        $fournisseur = new Fournisseur();
        $fournisseur->nom_fournisseur = $request->input('nom_fournisseur');
        $fournisseur->email_fournisseur = $request->input('email_fournisseur');
        $fournisseur->contact_fournisseur = $request->input('contact_fournisseur');
        $fournisseur->pays = $request->input('pays');
        $fournisseur->nom_boutique = $boutique->nom_boutique ;
        $fournisseur->nom_gestionnaire = $user->name;

        return redirect('/rap_fournisseurs')->with('status_save','fournisseur enregistré avec succès');
    }

    public function AllFournisseurs(){
        $user = Auth::user();

        $fournisseurs = Fournisseur::where('nom_gestionnaire', $user->name)->get();

        return view('fournisseurs.rap_fournisseurs', compact('fournisseurs'));
    }

    public function deleteFournisseurs($id){
        $fournisseurs = Fournisseur::find($id);

        $fournisseurs->delete();

        return back()->with('status_deleted', 'fournisseur supprimé avec succès');
    }

    public function updateView($id){

    }
}
