<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Reapprovisionnement;
use App\Models\Vente;
use App\Models\Ventes_details;
use Auth;
use Illuminate\Http\Request;
use Session;

class ReapprovisionnementController extends Controller
{
    //

    public function appro_view(){

        $boutique = Session::get('boutique_active');

        $fournisseurs = Fournisseur::where('nom_boutique', $boutique->nom_boutique)->get();
        $produit = Produit::where('nom_boutique', $boutique->nom_boutique)->get();

        return view('Reapprovisionnement.Reapprovisionnement', compact('fournisseurs','produit'));
    }

    public function add_reapprovisionnement(Request $request){

        $user = Auth::user();
        $boutique = Session::get('boutique_active');

        $messages = [
            'nom_fournisseur.required' => 'Le nom du fournisseur est requis.',

            'nom_produit.required' => 'Le produit est requis.',

            'date_reapprovisionnement.required' => 'La date de réapprovisionnement est requise.',
            'date_reapprovisionnement.date' => 'La date de réapprovisionnement n\'est pas valide.',
        ];

        $request->validate([
            'nom_fournisseur' => 'required|string|max:255',
            'nom_produit' => 'required|string|max:255',
            'qte_commandee' => 'required|integer|min:1',
            'montant_total' => 'required|numeric|min:0',
            'date_reapprovisionnement' => 'required|date',
        ], $messages);

        $reapprovisionnement = new Reapprovisionnement();

        $reapprovisionnement->nom_fournisseur = $request->input('nom_fournisseur');
        $reapprovisionnement->nom_produit = $request->input('nom_produit');
        $reapprovisionnement->qte_commandee = $request->input('qte_commandee');
        $reapprovisionnement->montant_total = $request->input('montant_total');
        $reapprovisionnement->status = 'non-livre';
        $reapprovisionnement->date_reapprovisionnement = $request->input('date_reapprovisionnement');
        $reapprovisionnement->nom_boutique = $boutique->nom_boutique;
        $reapprovisionnement->nom_gestionnaire = $user->name;
        $reapprovisionnement->save();

        $produit = Produit::where('nom_boutique', $boutique->nom_boutique)->where('nom_produit', $request->input('nom_produit'))->first();
        $produit->quantite_produit += $request->input('qte_commandee');
        $produit->save();

        return redirect('/rap_approvisionnement')->with('success_reapprovisionnement', 'Réapprovisionnement ajouté avec succès.');
    }

    public function delete_reapprovisionnement($id){
        $approv = Reapprovisionnement::find($id);
        $approv->delete();

        return back()->with('approv_delete', 'approvisionnement supprimé avec succès.');
    }

    public function approv_view(){
        $user = Auth::user();
        $boutique = Session::get('boutique_active');

        $approvisionnement = Reapprovisionnement::where('nom_boutique', $boutique->nom_boutique)->get();
        return view('Reapprovisionnement.rap_reapprovisionnement', compact('approvisionnement'));
    }

    public function update_reapprovisionnement_view($id){
        $approvisionnement = Reapprovisionnement::find($id);
        $fournisseurs = Fournisseur::where('nom_boutique', $approvisionnement->nom_boutique)->get();
        return view('Reapprovisionnement.update_reapprovisionnement', compact('approvisionnement', 'fournisseurs'));
    }

    public function modifier_approvisionnement(Request $request){

        $boutique = Session::get('boutique_active');
        $user = auth::user();

        $messages = [
            'nom_fournisseur.required' => 'Le nom du fournisseur est requis.',

            'nom_produit.required' => 'Le produit est requis.',

            'date_reapprovisionnement.required' => 'La date de réapprovisionnement est requise.',
            'date_reapprovisionnement.date' => 'La date de réapprovisionnement n\'est pas valide.',
        ];

        $request->validate([
            'nom_fournisseur' => 'required|string|max:255',
            'nom_produit' => 'required|string|max:255',
            'qte_commandee' => 'required|integer|min:1',
            'montant_total' => 'required|numeric|min:0',
            'date_reapprovisionnement' => 'required|date',
        ], $messages);

        $approv = Reapprovisionnement::find($request->input(key: 'id'));

        $ancienne_qte = $approv->qte_commandee;
        $produit = Produit::where('nom_boutique', $boutique->nom_boutique)->where('nom_produit', $request->input('nom_produit'))->first();
        $qte_produit = $produit->quantite_produit-$ancienne_qte;

        $approv->nom_fournisseur = $request->input('nom_fournisseur');
        $approv->nom_produit = $request->input('nom_produit');
        $approv->qte_commandee = $request->input('qte_commandee');
        $approv->montant_total = $request->input('montant_total');
        $approv->status = $request->input('status');
        $approv->date_reapprovisionnement = $request->input('date_reapprovisionnement');
        $approv->nom_boutique = $boutique->nom_boutique;
        $approv->nom_gestionnaire = $user->name;
        $approv->save();

        
        $produit->quantite_produit = $request->input('qte_commandee') + $qte_produit;
        $produit->save();

        return redirect('/rap_approvisionnement')->with('aprovisionnement modifié');

    }

    public function search_approv(){
        $search = $_GET['search'];
        $approvisionnement = Reapprovisionnement::where('nom_produit','LIKE','%'.$search.'%')->orWhere('nom_fournisseur','LIKE','%'.$search.'%')->get();
        return view('Reapprovisionnement.result_reapprovisionnement',compact('approvisionnement'));
    }

    public function statistics_view()
    {
        $topClients = Vente::select('nom_client')
            ->selectRaw('SUM(montant_total) as total')
            ->groupBy('nom_client')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $topProduits = Ventes_details::select('nom_produit')
            ->selectRaw('SUM(total) as total_vendu')
            ->groupBy('nom_produit')
            ->orderByDesc('total_vendu')
            ->limit(5)
            ->get();

        $ventesParMois = Vente::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as mois, SUM(montant_total) as total_mensuel')
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();

        
        return view('statistiques', compact('topClients','topProduits','ventesParMois'));
    }
    

}
