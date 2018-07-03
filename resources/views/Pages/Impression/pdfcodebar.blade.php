<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>

    </style>
</head>
<body>

    <div style="text-align: center">

            <div>{{$client->client_name}}</div>
            <div>{!! DNS1D::getBarcodeSVG("125478451645", 'C128',1.15,30) !!}</div>
            <div>{{$client->commande_num}}</div>

    </div>

</body>
</html>