@extends('layout.app')

@section('contenu')
    <h1>Modifier Service</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier Service</h3>
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
            <form action="{{ route('updateservice') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $service->id }}">
                <div class="form-group">
                    <label for="libelle">Nom</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $service->libelle }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $service->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="prix_ht">Prix HT</label>
                    <input type="number" class="form-control" id="prix_ht" name="prix_ht" value="{{ $service->prix_ht }}" required>
                </div>
                <div class="form-group">
                    <label for="taux_tva">Taux TVA</label>
                    <input type="number" class="form-control" id="taux_tva" name="taux_tva" value="{{ $service->taux_tva }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('services') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
