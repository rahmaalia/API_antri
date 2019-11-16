<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Polis;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli = Polis::all();

        $polianak = DB::table('dokters')->join('polis','dokters.id','=','polis.dokters_id')
                                        ->select('dokters.nama_dokter','polis.*')
                                        ->where('polis.id','=',1)->get();

            $poligigi = DB::table('dokters')->join('polis','dokters.id','=','polis.dokters_id')
                                        ->select('dokters.nama_dokter','polis.*')
                                        ->where('polis.id','=',2)->get();

            $poliumum = DB::table('dokters')->join('polis','dokters.id','=','polis.dokters_id')
                                        ->select('dokters.nama_dokter','polis.*')
                                        ->where('polis.id','=',3)->get();

            $polimata = DB::table('dokters')->join('polis','dokters.id','=','polis.dokters_id')
                                        ->select('dokters.nama_dokter','polis.*')
                                        ->where('polis.id','=',4)->get();
                                        

            foreach($polianak as $pa){
            }
            foreach($poligigi as $pg){
            };
            foreach($poliumum as $pu){
            };
            foreach($polimata as $pm){
            };
        return response() -> json([
            'status' => true,
            'polianak'=>$pa,
            'poligigi'=>$pg,
            'poliumum'=>$pu,
            'polimata'=>$pm], 200);
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
        //
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
        //
    }
}
