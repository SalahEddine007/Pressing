<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        <?php include(public_path().'/assets/css/codebase.min.css');?>
        body{background-color: #fff}
        *{
            color: #000000 !important;
        }
    </style>
</head>
<body>
<div style="margin-left: 25%;margin-right: 25%">

    <div style="text-align: center">
        <img src="{{ public_path() .'/'.$societe->societe_logo }}">
    </div>

    <div class="row">
        <div class="col-md-6">

                <h6>Nom Client: {{$client->client_name}}</h6>
                <h6>Num Ticket: {{$client->commande_num}}</h6>

        </div>
        <div class="col-md-6" style="margin-left: 60%">
            <div>{!! DNS1D::getBarcodeSVG("125478451645", 'C128',1.15,30) !!}</div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Libellé</th>
            <th>Qté</th>
            <th>Prix HT</th>
        </tr>
        @foreach($vetements as $vetement)
            <tr>
                <td>{{$vetement->vetement_libelle}}</td>
                <td>{{$vetement->vetement_quantity}}</td>
                <td>{{$vetement->vetement_price}}</td>
            </tr>
        @endforeach
    </table>

    <div style="text-align: right">
    <h6>Total TTC {{$client->commande_montant}} MAD</h6>
    </div>
    <div style="text-align: center">
        <h6>{{$client->commande_date=date('d F Y')}}</h6>
        <h6>----Merci de votre visite----</h6>
        <p>Adresse: {{$societe->societe_adresse}}</p>
        <p>Tel: {{$societe->societe_tele}}</p>
    </div>
</div>
</body>
</html>