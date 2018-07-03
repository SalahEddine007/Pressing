<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <title></title>
    <style>
        <?php include(public_path().'/assets/css/bootstrap.css');?>

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2" style="text-align: center">
            <img src="{{ asset($societe->societe_logo) }}">
        </div>
        <div class="col-md-10" style="text-align: left">
                <h5>{{$societe->societe_name}}</h5>
                <small>Ville: {{$societe->societe_city}}</small><br>
                <small>Tel: {{$societe->societe_tele}}</small><br>
                <small>Email: {{$societe->societe_email}}</small>
        </div>
    </div>

        <div class="col-sm-6" style="border:1px solid #72BB83;border-radius: 10px;margin-left: 50%">
            <h6>Nom Client: {{$client->client_name}}</h6>
            <h6>Référence de facture: {{$client->commande_num}}</h6>
            <h6>date de facture: {{$client->commande_date=date('d-m-Y')}}</h6>
            <h6>date de retrait: {{$client->commande_date_retrait=date('d-m-Y')}}</h6>
        </div>

    <div class="alert alert-success text-center" style="margin-top: 2%">
        <strong>Facture N°:</strong> {{$client->commande_num}}
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>Merci d'avoire choisi Ma Compagnies pour nos services. </p>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>libellé</th>
            <th>Prix HTC</th>
            <th>Qté</th>
            <th>Total HT</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vetements as $vetement)
        <tr>
            <td>{{$vetement->vetement_libelle}}</td>
            <td>{{$vetement->vetement_price}}</td>
            <td>{{$vetement->vetement_quantity}}</td>
            <td>{{$vetement->vetement_total}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>



    <div class="col-md-4" style="margin-left: 68%;text-align: left">
        <table>
            <thead>
            <tr>
                <th>Total HT:</th>
                <th>{{$client->commande_montant}} MAD</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>TVA:</th>
                <th>20%</th>
            </tr>
            </tbody>
        </table>


        <hr style="border-color: black;"/>
        <h5>Total TTC: {{$client->commande_montant}} MAD</h5>
    </div>

    <hr style="border-color: black;"/>

        <div class="row">
            <div class="col-sm-6" style="text-align: left">
                <h6>{{$societe->societe_adresse}}</h6>
                <h6>{{$societe->societe_city}}</h6>
                <h6>{{$societe->societe_tele}}</h6>
            </div>
            <div class="col-sm-6" style="text-align: right">
                <h6>CNSS : {{$societe->societe_cnss}}</h6>
                <h6>RC : {{$societe->societe_rc}}</h6>
                <h6>Pattente : {{$societe->societe_pattent}}</h6>
                <h6>IF : {{$societe->societe_if}}</h6>
                <h6>ICE : {{$societe->societe_ice}}</h6>
            </div>
        </div>
</div>
        <footer style="text-align: center">
            <p>-------- Merci pour votre visit --------</p>
        </footer>
</body>
</html>