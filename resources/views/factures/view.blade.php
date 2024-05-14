@extends('layout.app')
@section('contenu')
    <div class="invoice">
        <div class="invoice-header">
            <h1>Facture #{{ $facture->id }}</h1>
            <div class="invoice-info">
                <p><strong>Date de la facture:</strong> {{ $facture->date_facture }}</p>
                <p><strong>Date d'échéance:</strong> {{ $facture->date_echeance }}</p>
                <p><strong>Client:</strong> {{ $facture->user->nom }} {{ $facture->user->prenom }}</p>
            </div>
        </div>
        <div class="invoice-body">
            <table class="table table-bordered">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facture->lignesFacture as $ligne)
                        <tr>
                            <td>{{ $ligne->service->libelle }}</td>
                            <td>{{ $ligne->description }}</td>
                            <td>{{ $ligne->quantite }}</td>
                            <td>{{ $ligne->prix_unitaire_ht }}</td>
                            <td>{{ $ligne->montant_ht }}</td>
                            <td>{{ $ligne->taux_tva }}</td>
                            <td>{{ $ligne->montant_tva }}</td>
                            <td>{{ $ligne->montant_ttc }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <th>{{ $facture->lignesFacture->sum('montant_ht') }}</th>
                        <th></th>
                        <th>{{ $facture->lignesFacture->sum('montant_tva') }}</th>
                        <th>{{ $facture->lignesFacture->sum('montant_ttc') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="invoice-footer">
            <p><strong>État de paiement:</strong> {{ $facture->etat_paiement }}</p>
            <p><strong>Mode de paiement:</strong> {{ $facture->mode_paiement }}</p>
            <p><strong>Note:</strong> {{ $facture->note }}</p>
        </div>
        <div class="text-right mt-3">
            <a href="{{ route('facture.pdf', $facture->id) }}" class="btn btn-primary">Télécharger la facture en PDF</a>
        </div>
    </div>
    <style>
        .invoice {
            padding: 30px;
            background: #fff;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .invoice-header {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        .invoice-info p {
            margin: 0;
        }

        .invoice-body {
            margin-bottom: 20px;
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
    </style>
@endsection
