@extends('layout.app')

@section('contenu')
    <h1>Modifier Ligne de Facture</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier Ligne de Facture</h3>
        </div>
        <div class="card-body">
            @if (Session::has('status'))
                <div style="margin: 20px" class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div style="margin: 20px" class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <form action="{{ route('updatelignefacture', $ligneFacture->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $ligneFacture->description }}" required>
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $ligneFacture->quantite }}" required>
                </div>
                <div class="form-group">
                    <label for="prix_unitaire_ht">Prix Unitaire HT</label>
                    <input type="number" class="form-control" id="prix_unitaire_ht" name="prix_unitaire_ht" value="{{ $ligneFacture->prix_unitaire_ht }}" required>
                </div>
                <div class="form-group">
                    <label for="taux_tva">Taux TVA</label>
                    <input type="number" class="form-control" id="taux_tva" name="taux_tva" value="{{ $ligneFacture->taux_tva }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('viewlignesfacture', $ligneFacture->facture_id) }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
