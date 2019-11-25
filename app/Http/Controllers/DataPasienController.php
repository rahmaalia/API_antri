<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data_pasiens; 
use App\Data_pasien_umums;
use App\Data_pasien_matas;
use App\Data_pasien_gigis;   


class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Data_pasien = Data_pasien::all();
        return response() -> json([
            'pesan' => 'berhasil',
            'bio' => $Data_pasien], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $id_poli=$request->input('id_poli');
        if($id_poli==1){
           
            return response()->json([
                'status' => true,
                'pesan' => 'berhasil',
                'bio' => $Data_pasien],200);
        }
        
        else if($id_poli==2){
            
        return response()->json([
            'status' => true,
            'pesan' => 'berhasil',
            'bio' => $Data_pasien_gigi],200);
        }

       else if($id_poli==3){
           
        return response()->json([
            'status' => true,
            'pesan' => 'berhasil',
            'bio' => $Data_pasien_umum],200);
        }

        else if($id_poli==4){
           
        return response()->json([
            'status' => true,
            'pesan' => 'berhasil',
            'bio' => $Data_pasien_mata],200);
        
        }else {
            return response()->json([
                'status'=>false,
                'error' => 'Gagal',
        ]); 
        }

        

        
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
