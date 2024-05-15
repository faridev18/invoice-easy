@extends('layout.app')

@section('contenu')
    <h1>Modifier Facture</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier Facture</h3>
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
            <form action="{{ route('updatefacture') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $facture->id }}">
                <div class="form-group">
                    <label for="date_facture">Date de Facture</label>
                    <input type="date" class="form-control" id="date_facture" name="date_facture" value="{{ $facture->date_facture }}" required>
                </div>
                <div class="form-group">
                    <label for="date_echeance">Date d'échéance</label>
                    <input type="date" class="form-control" id="date_echeance" name="date_echeance" value="{{ $facture->date_echeance }}" required>
                </div>
                <div class="form-group">
                    <label for="objet">Objet</label>
                    <input type="text" class="form-control" id="objet" name="objet" value="{{ $facture->objet }}" required>
                </div>
                <div class="form-group">
                    <label for="montant_ht">Montant HT</label>
                    <input type="number" class="form-control" id="montant_ht" name="montant_ht" value="{{ $facture->montant_ht }}" required>
                </div>
                <div class="form-group">
                    <label for="taux_tva">Taux TVA</label>
                    <input type="number" class="form-control" id="taux_tva" name="taux_tva" value="{{ $facture->taux_tva }}" required>
                </div>
                <div class="form-group">
                    <label for="montant_ttc">Montant TTC</label>
                    <input type="number" class="form-control" id="montant_ttc" name="montant_ttc" value="{{ $facture->montant_ttc }}" required>
                </div>
                
                <div class="form-group">
                    <label for="mode_paiement">Mode de Paiement</label>
                    <input type="text" class="form-control" id="mode_paiement" name="mode_paiement" value="{{ $facture->mode_paiement }}" required>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note">{{ $facture->note }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('factures') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
