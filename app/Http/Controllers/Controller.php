<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\LigneFacture;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $users = User::all();
        return view('home')->with('users', $users);
    }

    public function ajouterUtilisateur()
    {
        return view('adduser');
    }

    public function gererUtilisateur(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nom', 'LIKE', "%{$search}%")
                ->orWhere('prenom', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        }

        if ($request->has('sort_by')) {
            $sortBy = $request->input('sort_by');
            $query->orderBy($sortBy, 'asc');
        }

        $users = $query->paginate(10);

        return view('users')->with('users', $users);
    }

    public function saveuser(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'type_user' => 'required|in:1,2,3,4',
            'adresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'code_postal' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'tva' => 'required|numeric',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'type_user' => $request->type_user,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'code_postal' => $request->code_postal,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'telephone' => $request->telephone,
            'tva' => $request->tva,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return redirect()->back()->with('status', 'Utilisateur ajouté avec succès!');
    }

    public function deleteuser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users')->with('statuss', 'Utilisateur supprimé avec succès !');
        } else {
            return redirect()->route('users')->with('errorr', 'Utilisateur non trouvé !');
        }
    }

    public function ajouterService()
    {
        return view('addservice');
    }

    public function saveservice(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix_ht' => 'required|numeric',
            'taux_tva' => 'required|numeric',
        ]);

        // Création d'une nouvelle instance de Service
        $service = new Service();
        $service->libelle = $request->input('nom');
        $service->description = $request->input('description');
        $service->prix_ht = $request->input('prix_ht');
        $service->taux_tva = $request->input('taux_tva');

        // Sauvegarde du service dans la base de données
        $service->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('status', 'Service ajouté avec succès!');
    }

    public function gererService(Request $request)
    {
        // Récupérer les services depuis la base de données
        $services = Service::query();

        // Effectuer une recherche si un terme de recherche est fourni
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $services->where('libelle', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }
        // Paginer les résultats
        $services = $services->paginate(10);

        // Retourner la vue avec les services paginés
        return view('services', compact('services'));
    }

    public function deleteservice($id)
    {
        // Recherche du service par ID
        $service = Service::find($id);

        // Vérification si le service existe
        if (!$service) {
            return redirect()->route('services')->with('error', 'Service non trouvé!');
        }

        // Suppression du service
        $service->delete();

        // Redirection avec un message de succès
        return redirect()->route('services')->with('status', 'Service supprimé avec succès!');
    }

    public function ajouterFacture()
    {
        $users = User::all(); // Supposons que votre modèle User soit correctement défini
        return view('addfacture', compact('users'));
    }

    public function saveFacture(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date_facture' => 'required|date',
            'date_echeance' => 'required|date',
            'objet' => 'required|string|max:255',
            'montant_ht' => 'required|numeric',
            'taux_tva' => 'required|numeric',
            'montant_ttc' => 'required|numeric',
            'etat_paiement' => 'required|string|max:255',
            'mode_paiement' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        // Création d'une nouvelle instance de Facture
        $facture = new Facture();
        $facture->user_id = $request->input('user_id');
        $facture->date_facture = $request->input('date_facture');
        $facture->date_echeance = $request->input('date_echeance');
        $facture->objet = $request->input('objet');
        $facture->montant_ht = $request->input('montant_ht');
        $facture->taux_tva = $request->input('taux_tva');
        $facture->montant_ttc = $request->input('montant_ttc');
        $facture->etat_paiement = $request->input('etat_paiement');
        $facture->mode_paiement = $request->input('mode_paiement');
        $facture->note = $request->input('note');

        // Sauvegarde de la facture dans la base de données
        $facture->save();

        // Redirection avec un message de succès
        return redirect()->route('factures')->with('status', 'Facture ajoutée avec succès!');
    }

    public function gererFacture()
    {
        $factures = Facture::paginate(10); // Paginer les résultats si nécessaire
        return view('factures', compact('factures'));
    }

    public function deleteFacture($id)
    {
        try {
            $facture = Facture::findOrFail($id); // Cherche la facture par son ID, échoue si non trouvée
            $facture->delete(); // Supprime la facture

            return redirect()->route('factures')->with('status', 'Facture supprimée avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('factures')->with('error', 'Une erreur s\'est produite lors de la suppression de la facture.');
        }
    }

    public function addLignesFacture($id)
    {
        $facture = Facture::findOrFail($id);
        $services = Service::all();
        return view('addlignesfacture', compact('facture', 'services'));
    }

    public function saveLignesFacture(Request $request, $factureId)
    {
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'description' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire_ht' => 'required|numeric|min:0',
            'taux_tva' => 'required|numeric|min:0',
        ]);

        $ligneFacture = new LigneFacture();
        $ligneFacture->facture_id = $factureId;
        $ligneFacture->service_id = $validatedData['service_id'];
        $ligneFacture->description = $validatedData['description'];
        $ligneFacture->quantite = $validatedData['quantite'];
        $ligneFacture->prix_unitaire_ht = $validatedData['prix_unitaire_ht'];
        $ligneFacture->taux_tva = $validatedData['taux_tva'];
        $ligneFacture->montant_ht = $validatedData['quantite'] * $validatedData['prix_unitaire_ht'];
        $ligneFacture->montant_tva = $ligneFacture->montant_ht * ($validatedData['taux_tva'] / 100);
        $ligneFacture->montant_ttc = $ligneFacture->montant_ht + $ligneFacture->montant_tva;

        $ligneFacture->save();

        return redirect()->route('factures')->with('status', 'Ligne de facture ajoutée avec succès!');
    }

    public function viewLignesFacture($id)
    {
        $facture = Facture::findOrFail($id);
        $lignesFacture = $facture->lignesFacture; // Assuming you have a relationship set up
        return view('viewlignesfacture', compact('facture', 'lignesFacture'));
    }

    public function deleteLigneFacture($id)
    {
        try {
            $ligneFacture = LigneFacture::findOrFail($id);
            $ligneFacture->delete();

            return redirect()->back()->with('status', 'Ligne de facture supprimée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression de la ligne de facture.');
        }
    }

    public function viewFacture($id)
    {
        $facture = Facture::with(['user', 'lignesFacture.service'])->findOrFail($id);
        return view('factures.view', compact('facture'));
    }

    public function generatePDF($id)
    {
        // Récupérez les données de la facture depuis la base de données
        $facture = Facture::findOrFail($id);

        // Chargez la vue avec les données de la facture
        $view = view('factures.pdf', compact('facture'))->render();

        // Générez le PDF à partir de la vue
        $pdf = PDF::loadHTML($view)->setPaper('a4', 'portrait');

        // Téléchargez le PDF
        return $pdf->download('facture-' . $facture->id . '.pdf');
    }

    public function gererMesFacture()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les factures de l'utilisateur connecté paginées
        $factures = $user->factures()->paginate(10);

        // Retourner la vue avec les factures de l'utilisateur connecté
        return view('mesfactures', compact('factures'));
    }

    public function savePayement(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'facture_id' => 'required|exists:factures,id',
            'date_paiement' => 'required|date',
            'montant_paiement' => 'required|numeric',
            'mode_paiement' => 'required|string|max:255',
        ]);

        // Création du paiement
        $paiement = new Paiement();
        $paiement->facture_id = $validated['facture_id'];
        $paiement->date_paiement = $validated['date_paiement'];
        $paiement->montant_paiement = $validated['montant_paiement'];
        $paiement->mode_paiement = $validated['mode_paiement'];
        $paiement->save();

        // Mise à jour de l'état de la facture si nécessaire
        $facture = Facture::find($validated['facture_id']);
        $facture->etat_paiement = 'payé';
        $facture->save();

        return redirect()->route('mes_factures', $paiement->facture_id)->with('success', 'Paiement enregistré avec succès.');
    }

}
