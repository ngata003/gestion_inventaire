<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use Auth;
use Illuminate\Http\Request;
use Session;

class BoutiqueController extends Controller
{
    //
    public function boutique_insertion(Request $request){

        $user = Auth::user();

        $messages = [
            'nom_boutique.required' => 'veuillez remplir la case de nom de boutique',
            'nom_boutique.unique' => 'changez ce nom de boutique , il exsite déjà',
            'nom_boutique.regex' => 'veuillez entrer un nom de boutique constitué uniquement des lettres miniscules et majuscules',
            'email_boutique.required' => 'veuillez entrer un email obligatoirement',
            'email_boutique.unique' => 'veuillez changer d\'adresse email celle la existe déjà',
            'email_boutique.regex' => 'veuillez entrer un email correct',
            'localisation_boutique.regex' => 'votre localisation doit etre sous ce format : Douala ou douala pas de chiffres',
            'site_web_boutique.regex' => 'veuillez entrer un site web valide',
            'logo_boutique.image' => 'Le fichier choisi doit être une image.',
            'logo_boutique.mimes' => 'L\'image doit être de type: jpeg, jpg, png, svg, gif.',
            'logo_boutique.max' => 'La taille maximale autorisée est 2 Mo.',
        ];

        $request->validate([
            'nom_boutique' => 'required|string|max:255|unique:boutiques,nom_boutique|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_boutique' => 'required|email|unique:boutiques,email_boutique|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact_boutique' => 'required|unique:boutiques,contact_boutique|regex:/^\+?[1-9]\d{6,14}$/',
            'localisation_boutique' => 'nullable|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'site_web_boutique' => 'nullable|regex:/^(https?:\/\/)?(www\.)?[\w\-]+\.[a-zA-Z]{2,6}(\/\S*)?$/',
            'logo_boutique' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ],$messages);

        if ($request->hasFile('logo_boutique')) {
            $imageFile = $request->file('logo_boutique');
            $logoBoutique = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('img'),$logoBoutique);
        }

        $boutique = new Boutique();

        $boutique->nom_boutique = $request->input('nom_boutique');
        $boutique->contact_boutique = $request->input('contact_boutique');
        $boutique->localisation_boutique = $request->input('localisation_boutique');
        $boutique->email_boutique = $request->input('email_boutique');
        $boutique->site_web_boutique = $request->input('site_web_boutique');
        $boutique->nom_proprietaire = $user->name;
        $boutique->logo_boutique =  $logoBoutique;

        $boutique->save();

        $user->boutique_created = true ;
        $user->save();

        Session::put('boutique_active', $boutique);

        return redirect('/myProfil')->with('success_message','votre boutique a été crée avec succès');

    }

    public function modifier_boutique(Request $request){
        $messages = [
            'nom_boutique.required' => 'veuillez remplir la case de nom de boutique',
            'nom_boutique.regex' => 'veuillez entrer un nom de boutique constitué uniquement des lettres miniscules et majuscules',
            'email_boutique.required' => 'veuillez entrer un email obligatoirement',
            'email_boutique.regex' => 'veuillez entrer un email correct',
            'localisation_boutique.required' => 'veuillez remplir la case de localisation de boutique',
            'localisation_boutique.regex' => 'votre localisation doit etre sous ce format : Douala ou douala pas de chiffres',
            'site_web_boutique.regex' => 'veuillez entrer un site web valide',
            'logo_boutique.image' => 'Le fichier choisi doit être une image.',
            'logo_boutique.mimes' => 'L\'image doit être de type: jpeg, jpg, png, svg, gif.',
            'logo_boutique.max' => 'La taille maximale autorisée est 2 Mo.',
        ];

        $request->validate([
            'nom_boutique' => 'required|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email_boutique' => 'required|string|max:255|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact_boutique' => 'required|regex:/^\+?[1-9]\d{6,14}$/',
            'localisation_boutique' => 'required|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'site_web_boutique' => 'nullable|regex:/^(https?:\/\/)?(www\.)?[\w\-]+\.[a-zA-Z]{2,6}(\/\S*)?$/',
            'logo_boutique' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ], $messages);

        $boutique = Boutique::find($request->id);

        $boutique->nom_boutique = $request->nom_boutique;
        $boutique->email_boutique = $request->email_boutique;
        $boutique->contact_boutique = $request->contact_boutique;
        $boutique->localisation_boutique = $request->localisation_boutique;
        $boutique->site_web_boutique = $request->site_web_boutique;
        if ($request->hasFile('logo_boutique')) {

            if(file_exists(public_path('img/'.$boutique->logo_boutique))){
                unlink(public_path('img/'.$boutique->logo_boutique));
            }


            $nouvelleImage = $request->file('logo_boutique');
            $nouveauNom = time().'.'.$nouvelleImage->getClientOriginalExtension();
            $nouvelleImage->move(public_path('img'),$nouveauNom);

            $boutique->logo_boutique = $nouveauNom;
        }

        $boutique->save();

        Session::put('boutique_active',$boutique);

        return back()->with('updateBoutique','boutique modifiée avec succès');
    }
}
