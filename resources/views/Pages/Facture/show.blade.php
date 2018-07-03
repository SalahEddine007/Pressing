@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
        .btn{
            padding: 0px 8px;
        }
        th{
            text-transform: none !important;
            font-size: 13px;
        }
        .badge{
            padding: 5px 10px 5px 10px;
        }
    </style>
@endsection

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tous Les Commandes</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full mytable">
                <thead>
                <tr>
                    {{--<th class="text-center" style="width: 10%;">ID</th>--}}
                    <th class="text-center" style="width: 10%;">NO°</th>
                    <th class="d-none d-sm-table-cell">Nom du Client</th>
                    <th class="text-center">Telephone du Client</th>
                    <th class="text-center">Date de Facture</th>
                    <th class="text-center">Date de Retrait</th>
                    <th class="text-center">Nombre de Pieces</th>
                    <th class="text-center">Montant Total</th>
                    <th class="text-center">Payer</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($factures as $facture)
                <tr>
                    <td class="font-w600 text-center ">{{$facture->commande_num}}</td>
                    <td class="font-w600 text-center">{{$facture->client_name}}</td>
                    <td class="font-w600 text-center">{{$facture->client_tele}}</td>
                    <td class="font-w600 text-center">{{date("d-m-Y",strtotime($facture->commande_date))}}</td>
                    <td class="font-w600 text-center">{{date("d-m-Y",strtotime($facture->commande_date_retrait))}}</td>
                    <td class="font-w600 text-center">{{$facture->commande_quantity}} <a href="/vetements/{{$facture->id_commande}}">(voir)</a></td>
                    <td class="font-w600 text-center">{{$facture->commande_montant}}DH (TTC)</td>
                    <td class="font-w600 text-center">
                        @if($facture->commande_paid=='oui')
                            <span class="badge badge-success">Oui</span>
                        @else
                            <span class="badge badge-danger">No</span>
                        @endif

                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            @can('delete', 'App\Commande')
                            <button type="button" class="btn btn-alt-danger mr-5 mb-5" data-toggle="modal" data-target="#{{$facture->id_commande}}" title="Delete">
                                <i class="fa fa-times"></i>Delete
                            </button>
                            @endcan
                            <button type="button" class="btn btn-alt-info mr-5 mb-5" data-toggle="modal" data-target="#{{$facture->commande_num}}" title="Impression">
                                    <i class="fa fa-upload mr-5"></i>Impression
                            </button>


                            <!--impression in modale-->
                            <div id="{{$facture->commande_num}}" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg modal-dialog-fromright" role="document">
                                    <div class="modal-content">
                                        <div class="block-header bg-primary-dark">
                                            <h4 class="block-title">La Commande: {{$facture->commande_num}}</h4>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="si si-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body">

                                                    <div class="text-center">
                                                        Nom Client : {{$facture->client_name}}
                                                        <br>
                                                        Montant Total : {{$facture->commande_montant}}DH (TTC)
                                                        <br>
                                                        Total de Pieces : {{$facture->commande_quantity}} Pieces
                                                    </div>
                                                        <br>
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


                            <!--delete commande-->
                            <div class="modal fade" id="{{$facture->id_commande}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-fromright" role="document">
                                    <div class="modal-content">
                                        <div class="block-header bg-primary-dark">
                                            <h5 class="block-title">Deleted Client</h5>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="si si-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to delete this Commandes ?</p>
                                        </div>
                                        <div class="modal-footer">

                                            <form action="/factures/{{$facture->id_commande}}" method="post">
                                                {{ method_field('DELETE') }}
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-alt-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{('assets/js/pages/be_tables_datatables.js')}}"></script>
    <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>

@endsection


