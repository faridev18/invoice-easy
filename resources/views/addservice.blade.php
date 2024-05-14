@extends('layout.app')
@section('contenu')

    <h1>Ajouter un Service</h1>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"> Ajouter un Service</h3>
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

        <form action="{{ route('saveservice') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="prix_ht">Prix HT</label>
                    <input type="text" name="prix_ht" class="form-control" id="prix_ht" placeholder="Prix HT">
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
