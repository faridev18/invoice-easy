@extends('layout.app')

@section('contenu')
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <!-- Utilisateurs -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Utilisateurs</span>
                        <span class="info-box-number">{{ $totalUsers }}</span>
                    </div>
                </div>
            </div>
            <!-- Clients -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-user-tie"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Clients</span>
                        <span class="info-box-number">{{ $totalClients }}</span>
                    </div>
                </div>
            </div>
            <!-- Comptables -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-user-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Comptables</span>
                        <span class="info-box-number">{{ $totalComptables }}</span>
                    </div>
                </div>
            </div>
            <!-- Secrétaires -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-user-secret"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Secrétaires</span>
                        <span class="info-box-number">{{ $totalSecretaires }}</span>
                    </div>
                </div>
            </div>
            <!-- Admins -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-user-shield"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Admins</span>
                        <span class="info-box-number">{{ $totalAdmins }}</span>
                    </div>
                </div>
            </div>
            <!-- Services -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-briefcase"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Services</span>
                        <span class="info-box-number">{{ $totalServices }}</span>
                    </div>
                </div>
            </div>
            <!-- Factures -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-file-invoice-dollar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Factures</span>
                        <span class="info-box-number">{{ $totalFactures }}</span>
                        <span class="info-box-number">Montant: {{ $totalMontantFactures }} FCFA</span>
                    </div>
                </div>
            </div>
            <!-- Paiements -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-credit-card"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Paiements</span>
                        <span class="info-box-number">{{ $totalPaiements }}</span>
                        <span class="info-box-number">Montant: {{ $totalMontantPaiements }} FCFA</span>
                    </div>
                </div>
            </div>
            <!-- Lignes de Factures -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-file-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Lignes de Factures</span>
                        <span class="info-box-number">{{ $totalLigneFactures }}</span>
                        <span class="info-box-number">Montant HT: {{ $totalMontantHTLigneFactures }} FCFA</span>
                        <span class="info-box-number">Montant TTC: {{ $totalMontantTTCLigneFactures }} FCFA</span>
                        <span class="info-box-number">Montant TVA: {{ $totalMontantTVALigneFactures }} FCFA</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="row">
            <!-- Graphique des utilisateurs -->
            <div class="col-md-6">
                <canvas id="usersChart"></canvas>
            </div>
            <!-- Graphique des factures -->
            <div class="col-md-6">
                <canvas id="facturesChart"></canvas>
            </div>
        </div>
    </div>
    <script>
        // Données pour le graphique des utilisateurs
        var ctxUsers = document.getElementById('usersChart').getContext('2d');
        var usersChart = new Chart(ctxUsers, {
            type: 'bar',
            data: {
                labels: ['Total', 'Clients', 'Comptables', 'Secrétaires', 'Admins'],
                datasets: [{
                    label: 'Nombre d\'utilisateurs',
                    data: [{{ $totalUsers }}, {{ $totalClients }}, {{ $totalComptables }},
                        {{ $totalSecretaires }}, {{ $totalAdmins }}
                    ],
                    backgroundColor: ['#17a2b8', '#28a745', '#ffc107', '#dc3545', '#007bff']
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Données pour le graphique des factures
        var ctxFactures = document.getElementById('facturesChart').getContext('2d');
        var facturesChart = new Chart(ctxFactures, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Montant des factures (FCFA)',
                    data: [ /* Ajoutez ici les montants mensuels des factures */ ],
                    borderColor: '#17a2b8',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
