@extends('layout.app')
@section('contenu')
    <h1>Lignes de facture pour la facture #{{ $facture->id }}</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lignes de facture</h3> <br>
            <a href="{{ route('addlignesfacture', $facture->id) }}" class="btn btn-primary">Ajouter une ligne de facture</a>

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
                            <th>Service</th>
                            <th>Description</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire HT</th>
                            <th>Montant HT</th>
                            <th>Taux TVA</th>
                            <th>Montant TVA</th>
                            <th>Montant TTC</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($lignesFacture as $ligne)
                            <tr>
                                <td>{{ $ligne->service->libelle }}</td>
                                <td>{{ $ligne->description }}</td>
                                <td>{{ $ligne->quantite }}</td>
                                <td>{{ $ligne->prix_unitaire_ht }}</td>
                                <td>{{ $ligne->montant_ht }}</td>
                                <td>{{ $ligne->taux_tva }}</td>
                                <td>{{ $ligne->montant_tva }}</td>
                                <td>{{ $ligne->montant_ttc }}</td>
                                <td>
                                    <form action="{{ route('deletelignefacture', $ligne->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne de facture ?');">
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
                            <th>Service</th>
                            <th>Description</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire HT</th>
                            <th>Montant HT</th>
                            <th>Taux TVA</th>
                            <th>Montant TVA</th>
                            <th>Montant TTC</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
