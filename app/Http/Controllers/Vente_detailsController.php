<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Produit;
use App\Models\Vente;
use App\Models\Ventes_details;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class Vente_detailsController extends Controller
{
    //

    public function addVentes (Request $request){
        $boutique = Session::get('boutique_active');
        $user = Auth::user();

        $request->validate([
            'nom_client' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'montant_paye' => 'required|numeric',
            'montant_total' => 'required|numeric',
            'remboursement' => 'required|numeric',
        ]);

        $vente = new Vente();

        $vente->nom_client = $request->nom_client;
        $vente->montant_paye = $request->montant_paye;
        $vente->montant_total = $request->montant_total;
        $vente->remboursement = $request->remboursement;
        $vente->nom_boutique = $boutique->nom_boutique;
        $vente->nom_gestionnaire = $user->name;

        $vente->save();

        $identifiant = $vente->id;

        $numRows = $request->numRows;

        $erreurs = [];

        for ($i = 0; $i < $numRows; $i++) {
            $nomProduit = $request->input('nom_produit' . $i);
            $qte = $request->input('qte_commandee' . $i);

            $produit = Produit::where('nom_produit', $nomProduit)->first();

            if (!$produit) {
                $erreurs[] = "Produit introuvable: $nomProduit";
            } elseif ($produit->quantite_produit == 0) {
                $erreurs[] = "Produit épuisé: $nomProduit";
            } elseif ($qte > $produit->quantite_produit) {
                $erreurs[] = "Quantité insuffisante pour le produit: $nomProduit. Stock: " . $produit->qte_commandee;
            }
        }


        if (!empty($erreurs)) {
            return back()->withErrors($erreurs)->withInput();
        }

        for ($i=0; $i <$numRows ; $i++) {
            $request->validate([
                'nom_produit'.$i => 'required|string|max:255',
                'prix_vente'.$i => 'required|numeric',
                'qte_commandee'.$i => 'required|integer',
                'total'.$i => 'required|numeric',
            ]);

            $details = new Ventes_details();

            $details->nom_produit = $request->input('nom_produit'.$i);
            $details->prix_vente = $request->input('prix_vente'.$i);
            $details->qte_commandee = $request->input('qte_commandee'.$i);
            $details->total = $request->input('total'.$i);
            $details->id_vente = $identifiant;
            $details->nom_gestionnaire = $user->name;
            $details->nom_boutique = $boutique->nom_boutique;

            $details->save();

            $produit = Produit::where('nom_produit', $details->nom_produit)->first();
            $produit->quantite_produit -= $details->qte_commandee;
            $produit->save();
        }

        $ventes = Ventes_details::where('id_vente', $identifiant)->get();
        $logo = $boutique->logo_boutique;
        $date = now()->format('Y-m-d'); // Date actuelle

        // Préparez les données pour la vue de la facture
        $data = [
            'logo' => $logo,
            'date' => $date,
            'email'=>$boutique->email_boutique,
            'contact'=>$boutique->contact_boutique,
            'site_web'=>$boutique->site_web_boutique,
            'localisation'=>$boutique->localisation_boutique,
            'id_facture' => $identifiant,
            'nom_client' => $request->input('nom_client'),
            'ventes' => $ventes,
            'montant_paye' => $request->input('montant_paye'),
            'remboursement'=>$request->input('remboursement'),
            'montant_total'=>$request->input('montant_total'),
        ];

        $pdf = Pdf::loadView('ventes.facture_vente',$data);
        return $pdf->stream('facture_' . $identifiant . '.pdf'); // Affiche le PDF dans le navigateur
    }

    public function vendre_view(){
        $boutique = Session::get('boutique_active');
        $produits = Produit::where('nom_boutique',$boutique->nom_boutique)->get();
        return view('ventes.vendre', compact('produits'));
    }

    public function rap_ventes_view(){
        $boutique = Session::get('boutique_active');
        $user = Auth::user();

        if($user->role === 'admin'){
            $ventes = Vente::where('nom_boutique',$boutique->nom_boutique)->get();
        }else{
            $ventes = Vente::where('nom_boutique',$boutique->nom_boutique)->where('nom_gestionnaire',$user->nom_gestionnaire)->get();
        }
        return view('ventes.rapport_ventes', compact('ventes'));
    }

    public function deleteVente($id){
        $vente = Vente::find($id);
        $vente->delete();
        Ventes_details::where('id_vente', $id)->delete();

        return back()->with('success_delete', 'Vente supprimée avec succès.');
    }


    public function search_ventes(){
        $search = $_GET['search'];
        $research = Vente::where('nom_client','LIKE','%'.$search.'%')->orWhereRaw("DATE_FORMAT(created_at, '%d-%m-%Y') LIKE ?", ["%{$search}%"])->get();
        return view('ventes.result_ventes',compact('research'));
    }

    public function voir_factures($id){
        $boutique_active = Session::get('boutique_active');
        $details = Ventes_details::where('id_vente',$id)->get();
        $boutique = Boutique::where('nom_boutique',$boutique_active->nom_boutique)->first();
        $vente = Vente::findOrFail($id);
        $data = [
                'details'=>$details,
                'vente'=>$vente,
                'boutique'=>$boutique,
        ];

        $pdf = Pdf::loadView('ventes.voir_factures', $data);

        $toDaydate = Carbon::now()->format('d-m-y');
        return $pdf->stream('invoice'.$vente->id.'-'.$toDaydate.'.pdf');

    }
}
