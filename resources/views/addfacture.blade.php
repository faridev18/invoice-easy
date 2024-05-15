@extends('layout.app')
@section('contenu')

    <h1>Ajouter une facture</h1>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"> Ajouter une facture</h3>
        </div>
        @if (count($errors) > 0)
            <div style="margin: 20px" class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif
        @if (Session::has('status'))
            <div style="margin: 20px" class="alert alert-success">
                {{ Session::get('status') }}
            </div>
        @endif

        <form action="{{ route('savefacture') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="user_id">Utilisateur</label>
                    <select name="user_id" class="form-control" id="user_id">
                        <option value="">- Selectionnez un utilisateur -</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->nom }} {{ $user->prenom }} | {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_facture">Date de facturation</label>
                    <input type="date" name="date_facture" class="form-control" id="date_facture">
                </div>
                <div class="form-group">
                    <label for="date_echeance">Date d'échéance</label>
                    <input type="date" name="date_echeance" class="form-control" id="date_echeance">
                </div>
                <div class="form-group">
                    <label for="objet">Objet</label>
                    <input type="text" name="objet" class="form-control" id="objet" placeholder="Objet">
                </div>
                <div class="form-group">
                    <label for="montant_ht">Montant HT</label>
                    <input type="text" name="montant_ht" class="form-control" id="montant_ht" placeholder="Montant HT">
                </div>
                <div class="form-group">
                    <label for="taux_tva">Taux TVA</label>
                    <input type="text" name="taux_tva" class="form-control" id="taux_tva" placeholder="Taux TVA">
                </div>
                <div class="form-group">
                    <label for="montant_ttc">Montant TTC</label>
                    <input type="text" name="montant_ttc" class="form-control" id="montant_ttc" placeholder="Montant TTC">
                </div>
                
                <div class="form-group">
                    <label for="mode_paiement">Mode de paiement</label>
                    <input type="text" name="mode_paiement" class="form-control" id="mode_paiement" placeholder="Mode de paiement">
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea name="note" class="form-control" id="note" placeholder="Note"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>

@endsection
