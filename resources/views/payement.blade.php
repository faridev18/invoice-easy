@extends('layout.app')
@section('contenu')
    <div style="padding: 20px 50px">
        <h1> Payement Facture #{{ request()->id}}</h1>

    </div>

    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script>
        openKkiapayWidget({
            amount: "{{ request()->montant }}",
            position: "center",
            callback: "http://127.0.0.1:8000/pay/{{ request()->id }}/{{ request()->montant }}",
            data: "",
            theme: "#65acff",
            sandbox: true,
            key: "ea9c08398923ebb532a9ee32a8560744a793440e"
        })
    </script>
@endsection
