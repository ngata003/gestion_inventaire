<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Session;

class FournisseurController extends Controller
{
    //

    public function add_fournisseurs(Request $request)
    {
        $user = auth()->user();
        $boutique = Session::get('boutique_active');

        $messages =
        [
            'nom_fournisseur.required' => 'Le nom du fournisseur est requis.',
            'nom_fournisseur.unique' => 'Ce nom de fournisseur existe déjà.',
            'nom_fournisseur.regex' => 'Le nom du fournisseur ne doit contenir que des lettres et des espaces.',

            'email_fournisseur.required' => 'L\'email du fournisseur est requis.',
            'email_fournisseur.regex' => 'L\'email du fournisseur doit être une adresse email valide.',
            'email_fournisseur.unique' => 'Cet email de fournisseur existe déjà.',

            'contact_fournisseur.required' => 'Le contact du fournisseur est requis.',
            'contact_fournisseur.unique' => 'Ce contact de fournisseur existe déjà.',
            'contact_fournisseur.regex' => 'Le contact du fournisseur ne doit contenir que des chiffres.',

            'pays.required' => 'Le pays est requis.',
            'pays.regex' => 'Le pays ne doit contenir que des lettres.',
        ];

        $request->validate([
            'nom_fournisseur' => 'required|string|max:255|unique:fournisseurs,nom_fournisseur|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_fournisseur' => 'required|email|max:255|unique:fournisseurs,email_fournisseur|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact_fournisseur' => 'required|string|max:15|unique:fournisseurs,contact_fournisseur|regex:/^\+?[1-9]\d{6,14}$/',
            'pays' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
        ], $messages);

        $fournisseur = new Fournisseur();

        $fournisseur->nom_fournisseur = $request->input('nom_fournisseur');
        $fournisseur->email_fournisseur = $request->input('email_fournisseur');
        $fournisseur->contact_fournisseur = $request->input('contact_fournisseur');
        $fournisseur->pays = $request->input('pays');
        $fournisseur->nom_boutique = $boutique->nom_boutique;
        $fournisseur->nom_gestionnaire = $user->name;
        $fournisseur->save();

        return redirect('/rapport_fournisseurs')->with('success_fournisseur', 'Fournisseur ajouté avec succès.');
    }

    public function rapport_fournisseurs()
    {
        $boutique = Session::get('boutique_active');
        $user = auth()->user();

        if ($user->type == 'admin') {
            $fournisseurs = Fournisseur::where('nom_boutique', $boutique->nom_boutique)->get();
            return view('fournisseurs.rap_fournisseurs', compact('fournisseurs'));
        }

        else if ($user->type == 'gestionnaire') {
            $fournisseurs = Fournisseur::where('nom_boutique', $boutique->nom_boutique)->where('nom_gestionnaire',$user->name)->get();
            return view('fournisseurs.rap_fournisseurs', compact('fournisseurs'));
        }
    }

    public function deleteFournisseur($id)
    {
        $fournisseur = Fournisseur::find($id);
        if ($fournisseur) {
            $fournisseur->delete();
            return back()->with('delete_fournisseur', 'Fournisseur supprimé avec succès.');
        } else {
            return redirect('/rapport_fournisseurs')->with('error_fournisseur', 'Fournisseur introuvable.');
        }
    }

    public function UpdateFournisseur_view($id)
    {
        $fournisseur = Fournisseur::find($id);
        return view('fournisseurs.update_fournisseurs', compact('fournisseur'));
    }

    public function updateFournisseur(Request $request)
    {
        $messages =
        [
            'nom_fournisseur.required' => 'Le nom du fournisseur est requis.',
            'nom_fournisseur.regex' => 'Le nom du fournisseur ne doit contenir que des lettres et des espaces.',

            'email_fournisseur.required' => 'L\'email du fournisseur est requis.',
            'email_fournisseur.regex' => 'L\'email du fournisseur doit être une adresse email valide.',

            'contact_fournisseur.required' => 'Le contact du fournisseur est requis.',
            'contact_fournisseur.regex' => 'Le contact du fournisseur ne doit contenir que des chiffres.',

            'pays.required' => 'Le pays est requis.',
            'pays.regex' => 'Le pays ne doit contenir que des lettres.',
        ];

        $request->validate([
            'nom_fournisseur' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_fournisseur' => 'required|email|max:255|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact_fournisseur' => 'required|string|max:15|regex:/^\+?[1-9]\d{6,14}$/',
            'pays' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
        ], $messages);

        $id = $request->input('id');
        $fournisseur = Fournisseur::find($id);

        $fournisseur->nom_fournisseur = $request->input('nom_fournisseur');
        $fournisseur->email_fournisseur = $request->input('email_fournisseur');
        $fournisseur->contact_fournisseur = $request->input('contact_fournisseur');
        $fournisseur->pays = $request->input('pays');
        $fournisseur->save();

        return redirect('/rapport_fournisseurs')->with('update_fournisseur', 'Fournisseur mis à jour avec succès.');
    }

    public function result_search_fournisseurs(){
        $search = $_GET['search'];
        $fournisseurs = Fournisseur::where('nom_fournisseur','LIKE','%'.$search.'%')->orWhere('email_fournisseur','LIKE','%'.$search.'%')->get();
        return view('fournisseurs.result_fournisseurs',compact('fournisseurs'));
    }
}
