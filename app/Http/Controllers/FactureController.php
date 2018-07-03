<?php

namespace App\Http\Controllers;


use App\Commande;
use Illuminate\Http\Request;
use App\Client;
use App\Facture;
use App\Vetement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Query\Builder;


class FactureController extends Controller
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

        $factures = DB::table('factures')->whereNull('deleted_at')->get();

        $this->authorize('view', 'App\Commande');
        return view('Pages.Facture.show', [
            'factures' => $factures,

        ]);
    }

    public function allCommandes()
    {
        $factures = DB::table('factures')->whereNotNull('deleted_at')->get();

        return view('Pages.Facture.allTrashed', [
            'factures' => $factures,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande = Commande::find($id);
        $this->authorize('delete', 'App\Commande');
        $commande->delete();
        return redirect('/factures');
    }

}
