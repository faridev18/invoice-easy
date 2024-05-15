@extends('layout.app')
@section('contenu')

    <h1>Ajouter un utilisateur</h1>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"> Ajouter un utilisateur</h3>
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

        <form action="{{ route('saveuser') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="type_user">Type d'utilisateur</label>
                    <select name="type_user" class="form-control" id="type_user">
                        <option value="1">Client</option>
                        <option value="2">Comptable</option>
                        <option value="3">Secretaire</option>
                        @if (Auth::user()->isAdmin())
                            <option value="4" >Admin</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="code_postal">Code Postal</label>
                    <input type="text" name="code_postal" class="form-control" id="code_postal" placeholder="Code Postal">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" class="form-control" id="ville" placeholder="Ville">
                </div>
                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" name="pays" class="form-control" id="pays" placeholder="Pays">
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Téléphone">
                </div>
                <div class="form-group">
                    <label for="tva">TVA</label>
                    <input type="text" name="tva" class="form-control" id="tva" placeholder="TVA">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
                </div>

                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>

@endsection
