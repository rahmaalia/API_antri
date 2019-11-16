<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antris;
use Illuminate\Support\Facades\DB;

class AntriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $antri = Antris::all();
        
        $antri = DB::table('polis')->join('antris','polis.id','=','antris.polis_id')
        ->select('polis.nama_poli','antris.*')
        ->where('antris.id','=',1)->get();

        return response() -> json([
            'status' => true,
            'pesan' => 'berhasil',
            'bio' => $antri], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $antri = new Antris();

        $antri->no_antrian = $request->no_antrian;
        $antri->data_pasiens_id = $request->data_pasiens_id;
        $antri->polis_id = $request->polis_id;
        $antri->save(); 
        return response() -> json([
            'pesan' => 'berhasil',
            'bio' => $antri], 200);
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
