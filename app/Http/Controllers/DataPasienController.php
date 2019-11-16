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
            $Data_pasien = new Data_pasiens;
            $Data_pasien->polis_id = $id_poli;
            $Data_pasien->no_identitas = $request->no_identitas;
            $Data_pasien->nama = $request->nama;
            $Data_pasien->kota_lahir = $request->kota_lahir;
            $Data_pasien->tgl_lahir = $request->tgl_lahir;
            $Data_pasien->alamat = $request->alamat;
            $Data_pasien->jenis_kelamin = $request->jenis_kelamin;
            $Data_pasien->save();
            return response()->json([
                'status' => true,
                'pesan' => 'berhasil',
                'bio' => $Data_pasien],200);
        }
        
        else if($id_poli==2){
            $Data_pasien_gigi = new Data_pasien_gigis;
        $Data_pasien_gigi->polis_id = $id_poli;
        $Data_pasien_gigi->no_identitas = $request->no_identitas;
        $Data_pasien_gigi->nama = $request->nama;
        $Data_pasien_gigi->kota_lahir = $request->kota_lahir;
        $Data_pasien_gigi->tgl_lahir = $request->tgl_lahir;
        $Data_pasien_gigi->alamat = $request->alamat;
        $Data_pasien_gigi->jenis_kelamin = $request->jenis_kelamin;
        $Data_pasien_gigi->save();
        return response()->json([
            'status' => true,
            'pesan' => 'berhasil',
            'bio' => $Data_pasien_gigi],200);
        }

       else if($id_poli==3){
            $Data_pasien_umum = new Data_pasien_umums;
        $Data_pasien_umum->polis_id = $id_poli;
        $Data_pasien_umum->no_identitas = $request->no_identitas;
        $Data_pasien_umum->nama = $request->nama;
        $Data_pasien_umum->kota_lahir = $request->kota_lahir;
        $Data_pasien_umum->tgl_lahir = $request->tgl_lahir;
        $Data_pasien_umum->alamat = $request->alamat;
        $Data_pasien_umum->jenis_kelamin = $request->jenis_kelamin;
        $Data_pasien_umum->save();
        return response()->json([
            'status' => true,
            'pesan' => 'berhasil',
            'bio' => $Data_pasien_umum],200);
        }

        else if($id_poli==4){
            $Data_pasien_mata = new Data_pasien_matas;
            $Data_pasien_mata->polis_id = $id_poli;

        $Data_pasien_mata->no_identitas = $request->no_identitas;
        $Data_pasien_mata->nama = $request->nama;
        $Data_pasien_mata->kota_lahir = $request->kota_lahir;
        $Data_pasien_mata->tgl_lahir = $request->tgl_lahir;
        $Data_pasien_mata->alamat = $request->alamat;
        $Data_pasien_mata->jenis_kelamin = $request->jenis_kelamin;
        $Data_pasien_mata->save();
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
