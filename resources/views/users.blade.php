@extends('layout.app')
@section('contenu')
    <h1>Utilisateurs</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Utilisateurs</h3>
            <div class="card-tools">
                <form action="{{ route('users') }}" method="GET">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Recherche">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('statuss'))
                <div style="margin: 20px" class="alert alert-success">
                    {{ Session::get('statuss') }}
                </div>
            @endif
            @if (Session::has('errorr'))
                <div style="margin: 20px" class="alert alert-danger">
                    {{ Session::get('errorr') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><a href="{{ route('users', ['sort_by' => 'nom']) }}">Nom</a></th>
                            <th><a href="{{ route('users', ['sort_by' => 'prenom']) }}">Prénom</a></th>
                            <th>Type d'utilisateur</th>
                            <th>Adresse</th>
                            <th><a href="{{ route('users', ['sort_by' => 'email']) }}">Email</a></th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Téléphone</th>
                            <th>TVA</th>
                            <th>Date d'ajout</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->nom }}</td>
                                <td>{{ $item->prenom }}</td>
                                <td>{{ $item->type_user }}</td>
                                <td>{{ $item->adresse }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->code_postal }}</td>
                                <td>{{ $item->ville }}</td>
                                <td>{{ $item->pays }}</td>
                                <td>{{ $item->telephone }}</td>
                                <td>{{ $item->tva }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ route('deleteuser', $item->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Type d'utilisateur</th>
                            <th>Adresse</th>
                            <th>Email</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Téléphone</th>
                            <th>TVA</th>
                            <th>Date d'ajout</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
