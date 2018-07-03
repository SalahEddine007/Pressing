<?php

namespace App\Http\Controllers;


use App\Societe;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;



class InstallationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Installation.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = new User;
        $societe = new Societe;

        $user->username=$request->username;
        $user->fullname=$request->user_name;
        $user->adresse=$request->user_adresse;
        $user->email=$request->user_email;
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
        $user->password=bcrypt($request->password);
        $user->is_admin=1;

        $societe->societe_name=$request->societe_name;
        $societe->societe_adresse=$request->societe_adresse;
        $societe->societe_city=$request->societe_city;
        $societe->societe_tele=$request->societe_tele;
        $societe->societe_website=$request->societe_website;

        //upload logo
        $file = Input::file('societe_logo');
        $logo_name = 'logo.'.$request->societe_logo->extension();
        $logo_local='assets/img/favicons/'.$logo_name;
        $file->move('assets/img/favicons', $logo_name);
        $societe->societe_logo=$logo_local;

        $societe->societe_email=$request->societe_email;
        $societe->societe_description=$request->societe_description;
        $societe->societe_cnss=$request->societe_cnss;
        $societe->societe_rc=$request->societe_rc;
        $societe->societe_if=$request->societe_if;
        $societe->societe_ice=$request->societe_ice;
        $societe->societe_pattent=$request->societe_pattent;

        $societe->save();
        $user->save();

        return redirect('/login');

    }



}
