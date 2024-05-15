@extends('layout.app')

@section('contenu')
    <h1>Modifier l'utilisateur</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier l'utilisateur</h3>
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
                    ssss
                </div>
            @endif
            
            <form action="{{ route('updateuser') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" value="{{ $user->nom }}">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" value="{{ $user->prenom }}">
                </div>
                <div class="form-group">
                    <label for="type_user">Type d'utilisateur</label>
                    <select name="type_user" class="form-control" id="type_user">
                        <option value="1" {{ $user->type_user === '1' ? 'selected' : '' }}>Client</option>
                        <option value="2" {{ $user->type_user === '2' ? 'selected' : '' }}>Comptable</option>
                        <option value="3" {{ $user->type_user === '3' ? 'selected' : '' }}>Secrétaire</option>
                        @if (Auth::user()->isAdmin())
                            <option value="4" {{ $user->type_user === '4' ? 'selected' : '' }}>Admin</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control" id="adresse" value="{{ $user->adresse }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="code_postal">Code Postal</label>
                    <input type="text" name="code_postal" class="form-control" id="code_postal"
                        value="{{ $user->code_postal }}">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" class="form-control" id="ville" value="{{ $user->ville }}">
                </div>
                <div class="form-group">
                    <label for="pays">Pays</label>
                    <input type="text" name="pays" class="form-control" id="pays" value="{{ $user->pays }}">
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone"
                        value="{{ $user->telephone }}">
                </div>
                <div class="form-group">
                    <label for="tva">TVA</label>
                    <input type="text" name="tva" class="form-control" id="tva" value="{{ $user->tva }}">
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
@endsection
