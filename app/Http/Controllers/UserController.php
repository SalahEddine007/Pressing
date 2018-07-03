<?php

namespace App\Http\Controllers;

use App\User;
use App\Permission;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->join('permissions', 'users.id', '=', 'permissions.id_user')->get();
        $this->authorize('view', 'App\User');
        return view('Pages.User.show', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'username' => "unique:users",
            'email' => 'email|unique:users'
        ];

       $this->validate($request,$rules);


        $user = new User();
        $user->fullname=$request->user_fullname;
        $user->username=$request->username;
        $user->adresse=$request->user_adresse;
        $user->email=$request->email;
        $user->tele=$request->user_tele;

        $pic = Input::file('user_picture');
        if ($pic==null){
            $picture_local='assets/img/avatars/avatar.png';
        }else{
            $picture_name = $request->username.'.'.$request->user_picture->extension();
            $picture_local='assets/img/avatars/'.$picture_name;
            $pic->move('assets/img/avatars', $picture_name);
        }

        $user->picture=$picture_local;
        $user->password=bcrypt($request->user_password);
        $user->is_admin=$request->user_permission;
        $user->save();

            $permission = new Permission();
            $permission->id_user=$user->id;
            $permission->save();


        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('permissions')
        ->where('id_user', $request->iduser)
        ->update(
            [
                'show_client' =>$request->has('showcl'),
                'create_client' =>$request->has('createcl'),
                'update_client' =>$request->has('updatecl'),
                'delete_client' =>$request->has('deletecl'),

                'show_commande' =>$request->has('showcm'),
                'create_commande' =>$request->has('createcm'),
                'update_commande' =>$request->has('updatecm'),
                'delete_commande' =>$request->has('deletecm'),
            ]);

        DB::table('users')
            ->where('id', $request->iduser)
            ->update(
                [
                    'username' =>$request->username,
                    'email' =>$request->email,
                    'fullname' =>$request->name,
                    'adresse' =>$request->adresse,
                    'tele' =>$request->telephone,



                ]);

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->join('permissions', 'users.id', '=', 'permissions.id_user')->where('id', '=', $id)->delete();
        return redirect('/users');
    }





    /**

     * Display a listing of the myform.

     *

     * @return \Illuminate\Http\Response

     */

    public function myform()

    {

        return view('Pages.User.ajax');

    }


    /**

     * Display a listing of the myformPost.

     *

     * @return \Illuminate\Http\Response

     */

    public function myformPost(Request $request)

    {


//        $validator = Validator::make($request->all(), [
//
////            'email' => 'require',
//
//             'username' => "required|string|min:6",
////
//            'email' => 'required|email|unique:users',
////
////            'address' => 'required',
//
//        ]);

        $rules = [
            'username' => "required|string|min:6|unique:users",
            'email' => 'required|email|unique:users',
        ];
        $messages = [
            'username.required' => "mother fucker",
            'email.unique' => 'okkkk',

        ];


        $validator = Validator::make($request->all(), $rules, $messages);



        if (!$validator->fails()) {

            return response()->json(['success'=>'Added new records.']);

        }


        return response()->json(['error'=>$validator->errors()->all()]);

    }
}
