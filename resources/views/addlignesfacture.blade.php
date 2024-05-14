@extends('layout.app')
@section('contenu')
    <h1>Ajouter des lignes à la facture #{{ $facture->id }}</h1>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Ajouter des lignes de facture</h3> <br>
            <a href="{{ route('viewlignesfacture', $facture->id) }}" class="btn btn-primary">Voir les lignes de facture</a>

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

        <form action="{{ route('savelignesfacture', $facture->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="service_id">Service</label>
                    <select name="service_id" class="form-control" id="service_id">
                        <option value="">- Sélectionner un service - </option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité</label>
                    <input type="number" name="quantite" class="form-control" id="quantite" placeholder="Quantité">
                </div>
                <div class="form-group">
                    <label for="prix_unitaire_ht">Prix Unitaire HT</label>
                    <input type="text" name="prix_unitaire_ht" class="form-control" id="prix_unitaire_ht" placeholder="Prix Unitaire HT">
                </div>
                <div class="form-group">
                    <label for="taux_tva">Taux TVA</label>
                    <input type="text" name="taux_tva" class="form-control" id="taux_tva" placeholder="Taux TVA">
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>
@endsection
