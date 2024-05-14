@extends('layout.app')
@section('contenu')
    <h1>Mes factures</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Mes factures</h3>
            <div class="card-tools">
                <form action="{{ route('factures') }}" method="GET">
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
                            <th>Utilisateur</th>
                            <th>Date de facture</th>
                            <th>Date d'échéance</th>
                            <th>Objet</th>
                            <th>Montant HT</th>
                            <th>Taux TVA</th>
                            <th>Montant TTC</th>
                            <th>État de paiement</th>
                            <th>Mode de paiement</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($factures as $facture)
                            <tr>
                                <td>{{ $facture->user->nom }} {{ $facture->user->prenom }}</td>
                                <td>{{ $facture->date_facture }}</td>
                                <td>{{ $facture->date_echeance }}</td>
                                <td>{{ $facture->objet }}</td>
                                <td>{{ $facture->montant_ht }}</td>
                                <td>{{ $facture->taux_tva }}</td>
                                <td>{{ $facture->montant_ttc }}</td>
                                <td>{{ $facture->etat_paiement }}</td>
                                <td>{{ $facture->mode_paiement }}</td>
                                <td>{{ $facture->note }}</td>
                                <td>
                                    {{-- <a href="{{ route('addlignesfacture', $facture->id) }}" class="btn btn-primary">Ajouter des lignes</a> --}}
                                    {{-- <a href="{{ route('viewlignesfacture', $facture->id) }}" class="btn btn-info">Voir les lignes</a> --}}
                                    <a href="{{ route('viewfacture', $facture->id) }}" class="btn btn-secondary">Voir la facture</a>
                                    {{-- <form action="{{ route('deletefacture', $facture->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette facture ?');" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form> --}}
                                </td>
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Date de facture</th>
                            <th>Date d'échéance</th>
                            <th>Objet</th>
                            <th>Montant HT</th>
                            <th>Taux TVA</th>
                            <th>Montant TTC</th>
                            <th>État de paiement</th>
                            <th>Mode de paiement</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $factures->links() }}
            </div>
        </div>
    </div>
@endsection
