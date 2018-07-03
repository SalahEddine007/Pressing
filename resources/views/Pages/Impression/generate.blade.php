@extends('Pages.main')

@section('page_style')


@endsection

@section('content')

    <!-- Bootstrap Forms Validation -->
    {{--<h2 class="content-heading">Bootstrap Forms</h2>--}}

    <div class="block" style="padding: 10px">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <!-- Default Pills -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">La Commande {{$facture->commande_num}}</h3>
                    </div>
                    <div class="block-content ">
                        <div class="container">
                            <div class="col-md-12">
                                Nom Client : {{$facture->client_name}}
                            </div>
                            <div class="col-md-12">
                                Montant Total : {{$facture->commande_montant}}DH (TTC)
                            </div>
                            <div class="col-md-12">
                                Total de Pieces : {{$facture->commande_quantity}} Pieces
                            </div>
                            <div class="text-center">
                                <a href="{{ url('/impression/ticket/'.$facture->id_commande) }}" class='btnprint'>
                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    Imprimer le Ticket <i class="fa fa-print"></i>
                                </button>
                                </a>
                                <a href="{{ url('/impression/codebar/'.$facture->id_commande) }}" class='btnprint'>
                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    Imprimer le Code Bar <i class="fa fa-barcode"></i>
                                </button>
                                </a>
                                <a href="{{ url('/impression/facture/'.$facture->id_commande) }}" class='btnprint'>
                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    Imprimer la Facture <i class="fa fa-print"></i>
                                </button>
                                </a>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('.btnprint').printPage();
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="container">
                            <div class="text-center">
                                <a href="/factures">
                                <button type="button" class="btn btn-alt-secondary min-width-125">
                                    <i class="fa fa-chevron-left fa-1x"></i> Retour
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Default Pills -->
            </div>

        </div>

    </div>
    <!-- Bootstrap Forms Validation -->

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
@endsection


