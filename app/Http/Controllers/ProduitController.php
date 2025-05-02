<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Auth;
use Illuminate\Http\Request;
use Session;

class ProduitController extends Controller
{
    //

    public function produit_insertion(Request $request){
        $boutique = Session::get('boutique_active');
        $user = Auth::user();

        $messages = [
            'nom_produit.required' => 'veuillez remplir la case de nom du produit',
            'nom_produit.unique' => 'changez ce nom car il est déjà enregistré.',
            'nom_produit.regex' => 'pas de nombre dans le nom rien que les lettres majuscules et miniscules.',
            'quantite_produit.required' =>  'veuillez remplir la case de la quantité',
            'prix_vente.required' => 'veuillez remplir la case de prix de vente',
            'categorie_produit.required' => 'veuillez remplir la case de categorie de produit',
            'image_produit.image' => 'Le fichier choisi doit être une image.',
            'image_produit.mimes' => 'L\'image doit être de type: jpeg, jpg, png, svg, gif.',
            'image_produit.max' => 'La taille maximale autorisée est 2 Mo.',

        ];

        $request->validate([

            'nom_produit'=>'required|string|max:255|unique:produits,nom_produit|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'description_produit'=>'nullable',
            'image_produit'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix_vente' => 'required',
            'quantite_produit' => 'required',
            'categorie_produit' => 'required',
        ], $messages);

        if ($request->hasFile('image_produit')) {
            $imageFile = $request->file('image_produit');
            $imageProduit = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('img'),$imageProduit);
        }


        $produit = new Produit();

        $produit->nom_produit = $request->input('nom_produit');
        $produit->description_produit = $request->input('description_produit');
        $produit->prix_vente = $request->input('prix_vente');
        $produit->quantite_produit = $request->input('quantite_produit');
        $produit->categorie_produit = $request->input('categorie_produit');
        $produit->image_produit = $imageProduit;
        $produit->nom_gestionnaire = $user->name;
        $produit->nom_boutique = $boutique->nom_boutique;

        $produit->save();
        return redirect('/rapport_produits')->with('success_message','votre produit a été enregistré avec succès');
    }

    public function Allproduct() {
        $boutique = Session::get('boutique_active');

        $product = Produit::where('nom_boutique',$boutique->nom_boutique)->get();

        return view('produits.rap_produits', compact('product'));

    }

    public function updateProduits($id){
        $product = Produit::find($id);

        return view('produits.produits_edit',compact('product'));
    }

    public function produit_modification (Request $request){
        $request->validate([
            'nom_produit' => 'required',
            'description_produit' => 'required',
            'quantite_produit' => 'required|numeric',
            'categorie_produit' => 'required',
            'prix_vente' => 'required|numeric',
            'image_produit' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Produit::find($request->id);

        $product->nom_produit = $request->input('nom_produit');
        $product->description_produit = $request->input('description_produit');
        $product->quantite_produit = $request->input('quantite_produit');
        $product->categorie_produit = $request->input('categorie_produit');
        $product->prix_vente = $request->input('prix_vente');

        if ($request->hasFile('image_produit')) {

            if(file_exists(public_path('img/'.$product->image_produit))){
                unlink(public_path('img/'.$product->image_produit));
            }


            $nouvelleImage = $request->file('image_produit');
            $nouveauNom = time().'.'.$nouvelleImage->getClientOriginalExtension();
            $nouvelleImage->move(public_path('img'),$nouveauNom);

            $product->image_produit = $nouveauNom;
        }

        $product->save();

        return redirect('/rapport_produits')->with('product_edit','votre produit a été modifié avec succès');
    }

    public function deleteProduits($id){
        $produit = Produit::find($id);
        $produit->delete();

        return back()->with('status_success','produit supprimé avec succès');
    }

    public function search_produits(){
        $search = $_GET['search'];
        $research = Produit::where('nom_produit','LIKE','%'.$search.'%')->orWhere('categorie_produit','LIKE','%'.$search.'%')->get();
        return view('produits.result_produits',compact('research'));
    }

    public function get_product_details(Request $request){
        $nom_produit = $request->input('nom_produit');
        $produits = Produit::select('prix_vente')->where('nom_produit',$nom_produit)->first();
        if($produits){
            return response()->json($produits);
        }

        else{
            return response()->json(['error'=>'produit non trouvé'],404);
        }
    }
}
