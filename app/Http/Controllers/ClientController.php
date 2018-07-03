<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ClientController extends Controller
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

        $clients = Client::all();
        $this->authorize('view', 'App\Client');
        return view('Pages.Client.show', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Client.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->client_name=$request->name;
        $client->client_tele=$request->tel;
        $client->client_adresse=$request->adresse;
        $this->authorize('create', 'App\Client');
        $client->save();
        return redirect('clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = DB::table('clients')->where('id_client', $id)->first();
        return view('Pages.Client.edit', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $client = DB::table('clients')->where('id_client', $id)->first();
//        return view('Pages.Client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $client = Client::find($request->idcl);
        $this->authorize('update', $client);
        DB::table('clients')
            ->where('id_client', $request->idcl)
            ->update(
                [
                    'client_name' =>$request->name,
                    'client_tele' =>$request->tel,
                    'client_adresse' =>$request->adresse
                ]);


        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$test = DB::table('permissions')->get()->first();
        //$test = Permission::get();
        $client = Client::find($id);
        //$client = DB::table('clients')->where('id_client', '=', $id);
        $this->authorize('delete', $client);
        $client->delete();
        return redirect('/clients');
    }

    public function downloadPDF($id){
        $client = $client = DB::table('clients')->where('id_client', $id)->first();

//        die(var_dump($client));
        $pdf = PDF::loadView('Pages.Client.pdf', ['client' => $client]);
        return $pdf->download('myclient.pdf');

    }
}
