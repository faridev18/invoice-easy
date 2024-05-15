@extends('layout.app')

@section('contenu')
    <h1>Paiements</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Paiements</h3>
            <div class="card-tools">
                <form action="{{ route('payements') }}" method="GET">
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
            @if (Session::has('success'))
                <div style="margin: 20px" class="alert alert-success">
                    {{ Session::get('success') }}
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
                            <th>Facture ID</th>
                            <th>Date Paiement</th>
                            <th>Montant Paiement</th>
                            <th>Mode Paiement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payements as $paiement)
                            <tr>
                                <td>{{ $paiement->facture_id }}</td>
                                <td>{{ $paiement->date_paiement }}</td>
                                <td>{{ $paiement->montant_paiement }}</td>
                                <td>{{ $paiement->mode_paiement }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Facture ID</th>
                            <th>Date Paiement</th>
                            <th>Montant Paiement</th>
                            <th>Mode Paiement</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $payements->links() }}
            </div>
        </div>
    </div>
@endsection
