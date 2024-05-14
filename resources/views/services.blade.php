@extends('layout.app')
@section('contenu')
    <h1>Services</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Services</h3>
            <div class="card-tools">
                <form action="{{ route('services') }}" method="GET">
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
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix HT</th>
                            <th>Taux TVA</th>
                            <th>Date d'ajout</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->libelle }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->prix_ht }}</td>
                                <td>{{ $service->taux_tva }}</td>
                                <td>{{ $service->created_at }}</td>
                                <td>
                                    <form action="{{ route('deleteservice', $service->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">
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
                            <th>Description</th>
                            <th>Prix HT</th>
                            <th>Taux TVA</th>
                            <th>Date d'ajout</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $services->links() }}
            </div>
        </div>
    </div>
@endsection
