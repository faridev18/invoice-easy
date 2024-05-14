<!-- facture_pdf.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture #{{ $facture->id }}</title>
    <style>
        /* Styles CSS pour le PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            /* background-color: #f4f4f4; */
            margin: 0;
            padding: 0;
        }

        .invoice {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .invoice-header {
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 20px;
            text-align: center;
        }

        .invoice-info p {
            margin: 5px 0;
        }

        .invoice-body table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-body th, .invoice-body td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
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
            <table>
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
        
    </div>
</body>
</html>
