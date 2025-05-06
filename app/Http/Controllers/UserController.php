<?php

namespace App\Http\Controllers;

use App\Mail\passwordGestionnaires;
use App\Models\Boutique;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Session;
use Str;

class UserController extends Controller
{
    //

    public function inscription_code(Request $request){

        $messages = [
            'name.required' => 'veuillez remplir la case de nom',
            'name.unique' => 'changez ce nom car il est déjà enregistré.',
            'name.regex' => 'pas de nombre dans le nom rien que les lettres majuscules et miniscules.',
            'email.required' => 'veuillez remplir la case de l\'email',
            'email.unique' => 'veuillez changer d\'adresse email celle-ci existe deja',
            'email.regex' =>  'veuillez entrer une adresse email valide regis aux regles',
            'contact.required' => 'veuillez remplir la case de contact',
            'contact.unique' => 'changez de contact car celui-ci existe déjà',
            'contact.regex' => 'entrez un contact valide regis aux règles',
            'role.required' => 'veuillez remplir la case de role',
            'image_utilisateur.image' => 'Le fichier choisi doit être une image.',
            'image_utilisateur.mimes' => 'L\'image doit être de type: jpeg, jpg, png, svg, gif.',
            'image_utilisateur.max' => 'La taille maximale autorisée est 2 Mo.',

        ];


        $request->validate([

            'name' => 'required|string|max:255|unique:users,name|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email' => 'required|string|max:255|unique:users,email|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact'=>'required|unique:users,contact|regex:/^\+?[1-9]\d{6,14}$/',
            'role' => 'required',
            'password' => 'required|string|max:12',
            'image_utilisateur' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
            'nom_gestionnaire' => 'nullable',
            'nom_boutique' => 'nullable',

        ], $messages );

        if ($request->hasFile('image_utilisateur')) {
            $imageFile = $request->file('image_utilisateur');
            $imageUser = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('img'),$imageUser);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->role = $request->role;
        $user->type = 'admin';
        $user->password = bcrypt($request->password);
        $user->image_utilisateur = $imageUser;
        $user->nom_gestionnaire = $request->nom_gestionnaire;
        $user->nom_boutique = $request->nom_boutique;
        $user->save();

        return redirect('/connexion')->with('status_inscription','inscription effectuée avec succès');

    }

    public function connexion_code(Request $request){

        $messages = [
            'email.required'=>'veuillez remplir la case de email',
            'email.regex' => 'veuillez entrer une adresse email valide regis par les règles',
            'password.required' => 'remplissez la case du mot de passe',
            'password.max' => 'votre mot de passe doit etre inferieur à 12 caractères',
        ];

        $request->validate([
            'email' => 'required|string|max:255|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'password'=>'required|max:12',

        ], $messages);

        $utilisateur = User::where('email',$request->email)->first();

        if(!$utilisateur){
            return back()->with('status_error', 'cet adresse email n\'existe pas ');
        }

        if (!Hash::check($request->password, $utilisateur->password)) {
            return back()->with('status_pas_error', 'votre mot de passe ne correspond pas');
        }

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials, $request->has('remember'))){
            if( $utilisateur->role === 'admin'){
                if ($utilisateur->boutique_created) {
                    $boutique = Boutique::where('nom_proprietaire', $utilisateur->name)->first();
                    Session::put('boutique_active',$boutique);

                    return redirect('/myProfil');
                }

                else{
                    return redirect('/boutique')->with('status_connexion', 'connexion effectuée avec succès');
                }
            }

            else if($utilisateur->type === 'gestionnaire') {
                $boutique = Boutique::where('nom_boutique', $utilisateur->nom_boutique)->first();
                Session::put('boutique_active',$boutique);

                return redirect('/myProfil');
            }
        }

        else{

            return redirect('/connexion')->with('status_connexion_error', 'veuillez revisiter vos coordonnées de connexion et puis relancez');
        }
    }


    public function ajout_gestionnaires (Request $request){

        //dd($request->all());

        $user = Auth::user();
        $boutique = Session::get('boutique_active');

        $messages = [
            'name.required' => 'veuillez remplir la case du nom',
            'name.unique' => 'veuillez changer ce nom car celui-ci existe déjà',
            'name.regex' => 'veuillez entrer un nom constitué des lettres majuscules ou miniscules pas de chiffres oups!',
            'role.required' =>  'veuillez remplir la case de role',
            'contact.required' => 'veuillez remplir la case de contact',
            'contact.unique' => 'veuillez changer ce contact car il existe déjà',
            'contact.regex' => 'veuillez entrer un contact valide qui respecte les normes',
            'email.required' => 'veuillez remplir la case de email',
            'email.unique'=>'veuillez changer cette adresse email elle existe déjà',
            'email.regex' => 'veuillez entrer une adresse valable qui respecte les normes',
        ];

        $request->validate([
            'name' => 'required|unique:users,name|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'role' => 'required',
            'contact' => 'required|unique:users,contact|regex:/^\+?[1-9]\d{6,14}$/',
            'email' => 'required|string|max:255|unique:users,email|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'image_utilisateur' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
            'type'=>'required',
        ] , $messages);

        $passwordFirst = Str::random(10);

        $password = bcrypt($passwordFirst);

        if ($request->hasFile('image_utilisateur')) {
            $imageFile = $request->file('image_utilisateur');
            $imageUser = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('img'),$imageUser);
        }

        $gestionnaire = new User();

        $gestionnaire->name = $request->name;
        $gestionnaire->role = $request->role;
        $gestionnaire->type = $request->type;
        $gestionnaire->contact = $request->contact;
        $gestionnaire->email = $request->email;
        $gestionnaire->password = $password;
        $gestionnaire->image_utilisateur = $imageUser;
        $gestionnaire->nom_gestionnaire =  $user->name;
        $gestionnaire->nom_boutique = $boutique->nom_boutique;
        $gestionnaire->save();

        Mail::to($gestionnaire->email)->send(mailable: new passwordGestionnaires(
            $gestionnaire->name,
            $gestionnaire->email,
            $passwordFirst
        ));

        return redirect('/rapport_gestionnaires')->with('gestionnaires_success', 'gestionnaire crée avec succès');
    }

    public function deconnexion(){
        Auth::logout();
        Session::forget('boutique_active');
        return redirect('/connexion')->with('status_logout', 'vous avez été déconnecté avec succès');
    }

    public function deleteGestionnaires($id){
        $gestionnaire = User::find($id);
        $gestionnaire->delete();
        return redirect('/rapport_gestionnaires')->with('delete_gestionnaire', 'gestionnaire supprimé avec succès');
    }

    public function AllGestionnaires(){
        $boutique = Session::get('boutique_active');

        $gestionnaires = User::where('nom_boutique', $boutique->nom_boutique)->where('type','gestionnaire')->get();
        return view('utilisateurs.rapport_gestionnaires', compact('gestionnaires'));
    }

    public function updateGestionnaires_view($id){
        $gestionnaire = User::find($id);
        return view('utilisateurs.gestionnaires_edit', compact('gestionnaire'));
    }

    public function updateGestionnairesTraitement(Request $request){
        $messages =[
            'name.required' => 'veuillez remplir la case de nom',
            'name.regex' => 'veuillez entrer un nom constitué des lettres majuscules ou miniscules pas de chiffres oups!',
            'email.required' => 'veuillez remplir la case de email',
            'email.regex' => 'veuillez entrer une adresse valable qui respecte les normes',
            'contact.required' => 'veuillez remplir la case de contact',
            'contact.regex' => 'veuillez entrer un contact valide qui respecte les normes',
        ];

       $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email' => 'required|string|max:255|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact'=>'required|regex:/^\+?[1-9]\d{6,14}$/',
            'role' => 'required',
        ],$messages);

        $gestionnaire = User::find($request->id);

        $gestionnaire->name = $request->name;
        $gestionnaire->email = $request->email;
        $gestionnaire->contact = $request->contact;
        $gestionnaire->role = $request->role;
        if ($request->hasFile('image_utilisateur')) {
            $imageFile = $request->file('image_utilisateur');
            $imageUtilisateur = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('img'),$imageUtilisateur);
        }

        $gestionnaire->save();

        return redirect('/rapport_gestionnaires')->with('update_gestionnaire', 'modification effectuée avec succès');
    }

    public function search_gestionnaires(){
        $search = $_GET['search'];
        $research = User::where('name','LIKE','%'.$search.'%')->orWhere('email','LIKE','%'.$search.'%')->get();
        return view('utilisateurs.result_gestionnaires',compact('research'));
    }


    public function modifier_profil(Request $request){
        $messages = [
            'name.required' => 'veuillez remplir la case de nom',
            'name.regex' => 'veuillez entrer un nom constitué des lettres majuscules ou miniscules pas de chiffres oups!',
            'contact.required' => 'veuillez remplir la case de contact',
            'contact.regex' => 'veuillez entrer un contact valide qui respecte les normes',
            'email.required' => 'veuillez remplir la case de email',
            'email.regex' => 'veuillez entrer une adresse valable qui respecte les normes',
            'password.confirmed' => 'veuillez confirmer votre mot de passe',
        ];
        $request->validate([
            'name' => 'required|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email' => 'required|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact' => 'required|regex:/^\+?[1-9]\d{6,14}$/',
            'image_utilisateur' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|String|max:12|confirmed',
        ]);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image_utilisateur')) {

            if(file_exists(public_path('img/'.$user->image_utilisateur))){
                unlink(public_path('img/'.$user->image_utilisateur));
            }


            $nouvelleImage = $request->file('image_utilisateur');
            $nouveauNom = time().'.'.$nouvelleImage->getClientOriginalExtension();
            $nouvelleImage->move(public_path('img'),$nouveauNom);

            $user->image_utilisateur = $nouveauNom;
        }

        $user->save();


        return redirect('/accueil')->with('status','vos informations ont ete modifiées avec succès');
    }
}
