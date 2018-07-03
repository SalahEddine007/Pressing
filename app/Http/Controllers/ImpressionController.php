<?php

namespace App\Http\Controllers;

use App\societe;
use App\Vetement;
use App\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ImpressionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('Pages.Impression.generate', [
            'id' => $id,
        ]);
    }
    public function destroy($id)
    {
      //
    }
    public function show($id)
    {
        $facture = DB::table('factures')->where('id_commande',$id)->first();

        return view('Pages.Impression.generate', [
            'facture' => $facture,
        ]);
    }

    public function facturePDF($id){
        $client = DB::table('clients')->join('commandes', 'clients.id_client', '=', 'commandes.id_client')->where('commandes.id_commande', $id)->first();
        $societe = DB::table('societes')->get()->first();
        $vetements = DB::table('vetements')->where('vetements.id_commande', $client->id_commande)->get();

        //$pdf = PDF::loadView('Pages.Impression.pdffacture', ['client' => $client, 'societe' => $societe, 'vetements' => $vetements]);
        //return $pdf->download('facture.pdf');
        return view('Pages.Impression.pdffacture', ['client' => $client, 'societe' => $societe, 'vetements' => $vetements]);
    }

    public function ticketPDF($id){
        $client = DB::table('clients')->leftJoin('commandes', 'clients.id_client', '=', 'commandes.id_client')->where('commandes.id_commande', $id)->first();
        $societe = DB::table('societes')->get()->first();
        $vetements = DB::table('vetements')->where('vetements.id_commande', $client->id_commande)->get();

        //$pdf = PDF::loadView('Pages.Impression.pdfticket', ['client' => $client, 'societe' => $societe, 'vetements' => $vetements]);
        //return $pdf->download('ticket.pdf');
        return view('Pages.Impression.pdfticket', ['client' => $client, 'societe' => $societe, 'vetements' => $vetements]);
    }

    public function codebar($id){
        $client = DB::table('clients')->leftJoin('commandes', 'clients.id_client', '=', 'commandes.id_client')->where('commandes.id_commande', $id)->first();

        //$pdf = PDF::loadView('Pages.Impression.pdfcodebar', ['client' => $client]);
        //return $pdf->download('codebar.pdf');
        return view('Pages.Impression.pdfcodebar', ['client' => $client]);
    }
}
