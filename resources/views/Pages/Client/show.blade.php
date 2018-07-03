@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
        .btn-secondary{
            padding: 0px 8px;
        }
    </style>
@endsection

@section('content')

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tous Les Clients</h3>
            @can('create', 'App\Client')
            <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#addclient" title="add">
                Ajouter Client
            </button>
            @endcan
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full mytable">
                <thead>
                <tr>
                    <th class="text-center" style="width: 10%;">ID</th>
                    <th class="d-none d-sm-table-cell">Nom</th>
                    <th class="text-center">Adresse</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Telephone</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr>
                    <td class="text-center">{{$client->id_client}}</td>
                    <td class="font-w600">{{$client->client_name}}</td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($client->client_adresse=='')
                            -
                            @else
                            {{$client->client_adresse}}
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($client->client_tele=='')
                            -
                        @else
                            {{$client->client_tele}}
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group">

                                @can('update', $client)
                                <button type="button" class="btn btn-sm btn-secondary" data-idcl="{{$client->id_client}}" data-name="{{$client->client_name}}" data-tel="{{$client->client_tele}}" data-adresse="{{$client->client_adresse}}" data-toggle="modal" data-target="#edit" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                @endcan

                                @can('delete', $client)
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#{{$client->id_client}}" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                                @endcan
                            <div class="modal fade" id="{{$client->id_client}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <p>Do you want to delete this Client ?</p>
                                        </div>
                                        <div class="modal-footer">

                                            <form action="/clients/{{$client->id_client}}" method="post">
                                                {{ method_field('DELETE') }}
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-secondary">Yes</button>
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
    <div id="edit" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-fromright" role="document">
            <div class="modal-content">
                <div class="block-header bg-primary-dark">
                    <h4 class="block-title">Edite Client</h4>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{route('clients.update','test')}}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <input type="hidden" id="idcl" name="idcl" value="">
                        <div class="form-group">
                            <label for="name" class="label-control col-md-4">name</label>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="label-control col-md-4">telephone</label>
                            <div class="col-md-8">
                                <input type="text" id="tel" name="tel" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="label-control col-md-4">adresse</label>
                            <div class="col-md-8">
                                <input type="text" id="adresse" name="adresse" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save change</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--add client-->
    <div id="addclient" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-fromright" role="document">
            <div class="modal-content">
                <div class="block-header bg-primary-dark">
                    <h4 class="block-title">Ajouter Client</h4>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="{{ url('clients') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="label-control col-md-4">name</label>
                            <div class="col-md-8">
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="label-control col-md-4">telephone</label>
                            <div class="col-md-8">
                                <input type="text" id="tel" name="tel" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adresse" class="label-control col-md-4">adresse</label>
                            <div class="col-md-8">
                                <input type="text" id="adresse" name="adresse" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
    <script>
        $('#edit').on('show.bs.modal', function (event) {
            console.log('open');
            var button = $(event.relatedTarget) // Button that triggered the modal
            var idcl = button.data('idcl')
            var name = button.data('name')
            var tel = button.data('tel')
            var adresse = button.data('adresse')// Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)

            modal.find('.modal-body #idcl').val(idcl);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #tel').val(tel);
            modal.find('.modal-body #adresse').val(adresse);
        })
    </script>
@endsection


