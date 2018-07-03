@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
        th{
            font-size: 10px;
        }

        .btn-edit{
            color: #fff;
            background-color: #00acfc;
            border-color: #00acfc;
            padding: 0px 8px;
        }
        .btn-delete{
            color: #fff;
            background-color: #fb5953;
            border-color: #fb5953;
            padding: 0px 8px;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;

        }

        .btn-upload {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 10px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 20px;
            position: absolute;
            left: 0;
            bottom: 0;
            opacity: 0;
            cursor: pointer;
        }
        .btn-block-option{
            cursor: pointer;
        }
        .error-lbl-color,.error-lbl2-color{
            color: #ef5350;
        }
        .error-border-color,.error-border2-color{
            border-bottom: 1px solid #ef5350;
        }
        .optionnel{
            font-size: 11px;
        }
        .nav-tabs-block{
            background-color: #C5C5C5;
        }
        .form-control, .input-group-addon{
            height: auto;
        }
    </style>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}

@endsection

@section('content')
    <!-- All Users -->


    <h2 class="content-heading">Gestion d'Utilisateur</h2>
@if ($errors->any())
    <div class="block pull-r-l" style="margin: 10px 0;">
@else
    <div class="block pull-r-l block-mode-hidden" style="margin: 10px 0;">
@endif
        <div class="block-header block-header-default ">
            <h3 class="block-title" data-toggle="block-option" >
                <i class="fa fa-fw fa-user font-size-default mr-5"></i>Ajouter un nouveau utilisateur
            </h3>
            <div class="block-options">
                <button type="button" style="color: white" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="block-content block-content-full">
                <div class="row justify-content-center py-20">
                    <div class="col-xl-12 col-md-12">
                        <form class="add-user-form" action="/users" method="post">
                            {{csrf_field()}}
                            <div class="col-md-12 col-md-offset-6">
                                <div class="row"><span style="color: red">* </span> : Champ obligatoire</div>
                                <div class="row">
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="user_fullname" name="user_fullname" value="{{old('user_fullname')}}">
                                            <label for="user_fullname">Nom - Prenom <span style="color: red">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="user_adresse" name="user_adresse" value="{{old('user_adresse')}}">
                                            <label for="user_adresse">Adresse personnel <span class="optionnel">(optionnel)</span></label>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="user_tele" name="user_tele" value="{{old('user_tele')}}">
                                            <label for="user_tele">Telephone <span class="optionnel">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    @if ($errors->has('username'))
                                    <div class="form-group col-md-3 col-sm-12 username-group is-invalid">
                                    @else
                                    <div class="form-group col-md-3 col-sm-12 username-group">
                                    @endif
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="username" name="username" value="{{old('username')}}">
                                            <label for="username" id="username-lbl">Nom d'Utilisateur <span style="color: red">*</span></label>
                                        </div>
                                        @if ($errors->has('username')&& $errors->first('username')!= '' )
                                        <div id="er_username-error" style="color: #ef5350" class="animated fadeInDown">
                                                {{ $errors->first('username') }}
                                            </div>
                                        @endif
                                    </div>
                                    @if ($errors->has('email'))
                                    <div class="form-group col-md-3 col-sm-12 email-group is-invalid">
                                    @else
                                    <div class="form-group col-md-3 col-sm-12 email-group">
                                    @endif
                                        <div class="form-material floating">
                                            <input class="form-control" type="text"  id="email" name="email" value="{{old('email')}}">
                                            <label for="email" id="email-lbl">Adresse Email <span style="color: red">*</span></label>
                                        </div>
                                        @if ($errors->has('email'))
                                            <div id="user_email-error" style="color: #ef5350" class="animated fadeInDown">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="user_password" name="user_password">
                                            <label for="user_password">Mot de pass<span style="color: red">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="user_confirm_password" name="user_confirm_password">
                                            <label for="user_confirm_password">Confirme le mot de pass<span style="color: red">*</span></label>
                                        </div>
                                    </div>
                                    {{--<div class="form-group col-md-3 col-sm-12">--}}
                                        {{--<div class="upload-btn-wrapper form-material">--}}
                                            {{--<button class="btn-upload" type="button">Uploader Photo de Profile</button>--}}
                                            {{--<input type="file" name="user_picture" id="user_picture" />--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="form-group col-md-3 col-sm-12">
                                        <label for="profile_picture">Photo de Profile <span style="font-size: 11px;">(optionnel)</span></label>
                                        <input type="file" id="user_picture" name="user_picture" style="display: none">
                                        <div class="col-md-12 text-center photo-user-profile">
                                            <span >
                                                <b id="photo-name-user">Click to upload</b>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="form-material">
                                            <div class="block">
                                                <h6 class="block-title">Administration Permission</h6>
                                                <div class="block-content">
                                                    <div class="row no-gutters items-push">
                                                        <div class="col-1">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="css-control css-control-primary css-radio">
                                                                        <input class="css-control-input" name="user_permission" value="1" type="radio">
                                                                        <span class="css-control-indicator"></span> Yes
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="css-control css-control-primary css-radio">
                                                                        <input class="css-control-input" name="user_permission" value="0" checked="" type="radio">
                                                                        <span class="css-control-indicator"></span> No
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-11 ">
                                                            <button class="btn btn-success btn-submit pull-right" type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- All Users -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-fw fa-users font-size-default mr-5"></i> Tous Les Clients</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full mytable">
                <thead>
                <tr>
                    <th class="text-center" style="width: 5%;">ID</th>
                    <th class="d-none d-sm-table-cell" style="width: 5%;">Photo</th>
                    <th class="d-none d-sm-table-cell"style="width: 15%;">Nom Complete</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Adresse</th>
                    <th class="d-none d-sm-table-cell" style="width: 10%;">Telephone</th>
                    <th class="d-none d-sm-table-cell" style="width: 10%;">Nom de l'Utilisateur</th>
                    <th class="d-none d-sm-table-cell"  style="width: 20%;" >Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Mot de pass</th>
                    <th class="text-center" style="width: 5%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{$user->id}}</td>
                        <td class="text-center"><img class="img-avatar img-avatar32" src="{{asset($user->picture)}}" alt="{{$user->fullname}}" ></td>
                        <td class="font-w400">{{$user->fullname}}</td>
                        <td class="d-none d-sm-table-cell text-center">
                            @if($user->adresse=='')
                                -
                            @else
                                {{$user->adresse}}
                            @endif
                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                            @if($user->tele=='')
                                -
                            @else
                                {{$user->tele}}
                            @endif
                        </td>
                        <td class="font-w400">{{$user->username}}</td>
                        <td class="font-w400">{{$user->email}}</td>
                        <td class="font-w400">*******</td>
                        <td class="">
                            <div class="btn-group">

                                <button type="button" class="btn btn-sm btn-edit" data-toggle="modal" data-target="#{{$user->id}}" title="autorisation">
                                    <i class="fa fa-pencil"></i>
                                </button>


                                <button type="button" class="btn btn-sm btn-delete" data-toggle="modal" data-target="#{{$user->tele}}" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>

                                <div class="modal fade" id="{{$user->tele}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-fromright" role="document">
                                        <div class="modal-content">
                                            <div class="block-header bg-primary-dark">
                                                <h5 class="block-title">Deleted user</h5>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                        <i class="si si-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you want to delete this user ?</p>
                                            </div>
                                            <div class="modal-footer">

                                                <form action="/users/{{$user->id}}" method="post">
                                                    {{ method_field('DELETE') }}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-sm btn-delete">
                                                        Yes
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <!--authorisation in modale-->
                            <div id="{{$user->id}}" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg modal-dialog-fromright" role="document">
                                    <div class="modal-content">
                                        <div class="block-header bg-primary-dark">
                                            <h4 class="block-title">Update {{$user->fullname}}</h4>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="si si-close"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('users.update','test')}}" method="post">
                                                {{ method_field('patch') }}
                                                {{ csrf_field() }}
                                            <div class="block">
                                                <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                                                    <li class="nav-item active show">
                                                        <a data-toggle="tab" class="nav-link" href="#{{$user->id}}Générale">Générale</a>
                                                    </li>
                                                    @if($user->is_admin==0)
                                                    <li class="nav-item">
                                                        <a data-toggle="tab" class="nav-link" href="#{{$user->id}}Permission">Permission</a>
                                                    </li>
                                                    @endif
                                                </ul>
                                                <div class="block-content tab-content">
                                                    <div class="tab-pane active show" id="{{$user->id}}Générale" role="tabpanel">

                                                        <input type="hidden" id="iduser" name="iduser" value="{{$user->id}}">
                                                        <div class="form-group">
                                                            <label for="name" class="label-control col-md-4">name</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="name" name="name" class="form-control" value="{{$user->fullname}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adresse" class="label-control col-md-4">adresse</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="adresse" name="adresse" class="form-control" value="{{$user->adresse}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel" class="label-control col-md-4">telephone</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="tel" name="tel" class="form-control" value="{{$user->tele}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="label-control col-md-4">username</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="username" name="username" class="form-control" value="{{$user->username}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email" class="label-control col-md-4">email</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="email" name="email" class="form-control" value="{{$user->email}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="label-control col-md-4">New password</label>
                                                            <div class="col-md-8">
                                                                <input type="text" id="password" name="password" class="form-control">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="{{$user->id}}Permission" role="tabpanel">

                                                        <div class="row">
                                                        <div class="col-md-5">
                                                            <h5>Client</h5>
                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="showcl" class="css-control-input" @if($user->show_client==1){ checked="" }@endif value="{{$user->show_client}}">
                                                                <span class="css-control-indicator"></span> show
                                                            </label>

                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="createcl" class="css-control-input" @if($user->create_client==1){ checked="" }@endif value="{{$user->create_client}}">
                                                                <span class="css-control-indicator"></span> create
                                                            </label>

                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="updatecl" class="css-control-input" @if($user->update_client==1){ checked="" }@endif value="{{$user->update_client}}">
                                                                <span class="css-control-indicator"></span> update
                                                            </label>

                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="deletecl" class="css-control-input" @if($user->delete_client==1){ checked="" }@endif value="{{$user->delete_client}}">
                                                                <span class="css-control-indicator"></span> delete
                                                            </label>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <h5>Commande</h5>
                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="showcm" class="css-control-input" @if($user->show_commande==1){ checked="" }@endif value="{{$user->show_commande}}">
                                                                <span class="css-control-indicator"></span> show
                                                            </label>

                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="createcm" class="css-control-input" @if($user->create_commande==1){ checked="" }@endif value="{{$user->create_commande}}">
                                                                <span class="css-control-indicator"></span> create
                                                            </label>

                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="updatecm" class="css-control-input" @if($user->update_commande==1){ checked="" }@endif value="{{$user->update_commande}}">
                                                                <span class="css-control-indicator"></span> update
                                                            </label>

                                                            <label class="css-control css-control-primary css-checkbox">
                                                                <input type="checkbox" name="deletecm" class="css-control-input" @if($user->delete_commande==1){ checked="" }@endif value="{{$user->delete_commande}}">
                                                                <span class="css-control-indicator"></span> delete
                                                            </label>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
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
    <script src="{{('assets/js/pages/users_validation.js')}}"></script>


@endsection


