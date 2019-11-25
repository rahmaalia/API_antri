<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antris;
use App\Antri_gigi;
use App\Antri_umum;
use App\Antri_mata;
use App\Data_pasiens; 
use App\Data_pasien_umums;
use App\Data_pasien_matas;
use App\Data_pasien_gigis;
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
        
        $antri = DB::table('polis')
        ->join('antris','polis.id','=','antris.polis_id')
        ->join('antris','data_pasiens.id','=','antris.data_pasiens_id')
        ->select('polis.nama_poli','antris.no_antrian','data_pasiens.nama')
        ->where('antris.id','=',1)->get();

        foreach($antri as $a){
        }

        return response() -> json([
            'status' => true,
            'bio' => $a], 200);
        
    }


    public function getno($id_poli)
    {
        if ($id_poli==1) {
            $no_antrian = DB::table('antris')->latest('id')->first();
            if ($no_antrian == null) {
               
                $no_antriannull=array(
                    "id"=>0
                );
                return response() -> json([
                    'status' => true,
                    'no_antrian' =>$no_antriannull], 200);
            }else {
                return response() -> json([
                    'status' => true,
                    'no_antrian' => $no_antrian], 200);
            }
        }
        if ($id_poli==2) {
            $no_antriangigi = DB::table('antri_gigis')->latest('id')->first();
            if ($no_antriangigi == null) {
                $no_antriannull=array(
                    "id"=>0
                );
                return response() -> json([
                    'status' => true,
                    'no_antrian' =>$no_antriannull], 200);
            }else {
                return response() -> json([
                    'status' => true,
                    'no_antrian' => $no_antriangigi], 200);
            }
        }
        if ($id_poli==3) {
            $no_antrianumum = DB::table('antri_umums')->latest('id')->first();
            if ($no_antrianumum == null) {
                $no_antriannull=array(
                    "id"=>0
                );
                return response() -> json([
                    'status' => true,
                    'no_antrian' =>$no_antriannull], 200);
            }else {
                return response() -> json([
                    'status' => true,
                    'no_antrian' => $no_antrianumum], 200);
            }
        }
        if ($id_poli==4) {
            $no_antrianmata = DB::table('antri_matas')->latest('id')->first();
            if ($no_antrianmata == null) {
                $no_antriannull=array(
                    "id"=>0
                );
                return response() -> json([
                    'status' => true,
                    'no_antrian' =>$no_antriannull], 200);
            }else {
                return response() -> json([
                    'status' => true,
                    'no_antrian' => $no_antrianmata], 200);
            }
        }
    }

    

    public function postber(request $request){

        $user = $request->input('id_user');
        $status = $request->input('status');

        $antri = DB::table('antris')
        ->join('data_pasiens','data_pasiens.id','=','antris.data_pasiens_id')
        ->join('users','data_pasiens.users_id','=','users.id')
        ->join('polis','antris.polis_id','=','polis.id')
        ->select('users.nama','antris.*','data_pasiens.nama','polis.nama_poli')
        ->where('users.id','=',$user)
        ->where('antris.status','=',$status)->get();

        $antrigigi = DB::table('antri_gigis')
        ->join('data_pasien_gigis','data_pasien_gigis.id','=','antri_gigis.data_pasien_gigis_id')
        ->join('users','data_pasien_gigis.users_id','=','users.id')
        ->join('polis','antri_gigis.polis_id','=','polis.id')
        ->select('users.nama','antri_gigis.*','data_pasien_gigis.nama','polis.nama_poli')
        ->where('users.id','=',$user)
        ->where('antri_gigis.status','=',$status)->get();

        $antriumum = DB::table('antri_umums')
        ->join('data_pasien_umums','data_pasien_umums.id','=','antri_umums.data_pasien_umums_id')
        ->join('users','data_pasien_umums.users_id','=','users.id')
        ->join('polis','antri_umums.polis_id','=','polis.id')
        ->select('users.nama','antri_umums.*','data_pasien_umums.nama','polis.nama_poli')
        ->where('users.id','=',$user)
        ->where('antri_umums.status','=',$status)->get();

        $antrimata = DB::table('antri_matas')
        ->join('data_pasien_matas','data_pasien_matas.id','=','antri_matas.data_pasien_matas_id')
        ->join('users','data_pasien_matas.users_id','=','users.id')
        ->join('polis','antri_matas.polis_id','=','polis.id')
        ->select('users.nama','antri_matas.*','data_pasien_matas.nama','polis.nama_poli')
        ->where('users.id','=',$user)
        ->where('antri_matas.status','=',$status)->get();
        
        return response() -> json([
            'status' => true,
            'antri_anak' => $antri,
            'antri_gigi' => $antrigigi,
            'antri_umum' => $antriumum,
            'antri_mata' => $antrimata], 200);
    
    }


    public function create(request $request)
    {
        $status = "berlangsung";

        
        $id_poli=$request->input('id_poli');
        if($id_poli==1){
            $Data_pasien = new Data_pasiens;
            $Data_pasien->polis_id = $id_poli;
            $Data_pasien->users_id = $request->users_id;
            $Data_pasien->no_identitas = $request->no_identitas;
            $Data_pasien->nama = $request->nama;
            $Data_pasien->kota_lahir = $request->kota_lahir;
            $Data_pasien->tgl_lahir = $request->tgl_lahir;
            $Data_pasien->alamat = $request->alamat;
            $Data_pasien->jenis_kelamin = $request->jenis_kelamin;
            if ($Data_pasien->save()) {
                $Data_pasien_id = $Data_pasien->id; 
                $antri = new Antris();
                $antri->no_antrian = $request->no_antrian;
                $antri->data_pasiens_id = $Data_pasien_id;
                $antri->polis_id = $request->id_poli;
                $antri->status = $status;
                $antri->save(); 
                return response()->json([
                'pesan' => 'berhasil',
                'bio' => $antri], 200);
            }
            
            
        }

        else if($id_poli==2){
            $Data_pasien_gigi = new Data_pasien_gigis;
            $Data_pasien_gigi->polis_id = $id_poli;
            $Data_pasien_gigi->users_id = $request->users_id;
            $Data_pasien_gigi->no_identitas = $request->no_identitas;
            $Data_pasien_gigi->nama = $request->nama;
            $Data_pasien_gigi->kota_lahir = $request->kota_lahir;
            $Data_pasien_gigi->tgl_lahir = $request->tgl_lahir;
            $Data_pasien_gigi->alamat = $request->alamat;
            $Data_pasien_gigi->jenis_kelamin = $request->jenis_kelamin;
            if ( $Data_pasien_gigi->save()) {
                $Data_pasien_gigi_id = $Data_pasien_gigi->id;
                $antri_gigi = new Antri_gigi();
                $antri_gigi->no_antrian = $request->no_antrian;
                $antri_gigi->Data_pasien_gigis_id = $Data_pasien_gigi_id;
                $antri_gigi->polis_id = $request->id_poli;
                $antri_gigi->status = $status;
                $antri_gigi->save(); 
                return response() -> json([
                    'pesan' => 'berhasil',
                    'bio' => $antri_gigi], 200);
            }
           
           
        }

        else if($id_poli==3){
            $Data_pasien_umum = new Data_pasien_umums;
            $Data_pasien_umum->polis_id = $id_poli;
            $Data_pasien_umum->users_id = $request->users_id;
            $Data_pasien_umum->no_identitas = $request->no_identitas;
            $Data_pasien_umum->nama = $request->nama;
            $Data_pasien_umum->kota_lahir = $request->kota_lahir;
            $Data_pasien_umum->tgl_lahir = $request->tgl_lahir;
            $Data_pasien_umum->alamat = $request->alamat;
            $Data_pasien_umum->jenis_kelamin = $request->jenis_kelamin;
            if ($Data_pasien_umum->save()) {
                $Data_pasien_umum_id = $Data_pasien_umum->id;
                $antri_umum = new Antri_umum();
                $antri_umum->no_antrian = $request->no_antrian;
                $antri_umum->data_pasien_umums_id = $Data_pasien_umum_id;
                $antri_umum->polis_id = $request->id_poli;
                $antri_umum->status = $status;
                $antri_umum->save(); 
                return response() -> json([
                    'pesan' => 'berhasil',
                    'bio' => $antri_umum], 200);
            }
           
        }

        else if($id_poli==4){
            $Data_pasien_mata = new Data_pasien_matas;
            $Data_pasien_mata->polis_id = $id_poli;
            $Data_pasien_mata->users_id = $request->users_id;
            $Data_pasien_mata->no_identitas = $request->no_identitas;
            $Data_pasien_mata->nama = $request->nama;
            $Data_pasien_mata->kota_lahir = $request->kota_lahir;
            $Data_pasien_mata->tgl_lahir = $request->tgl_lahir;
            $Data_pasien_mata->alamat = $request->alamat;
            $Data_pasien_mata->jenis_kelamin = $request->jenis_kelamin;
            if ($Data_pasien_mata->save()) {
                $Data_pasien_mata_id = $Data_pasien_mata->id;
                $antri_mata = new Antri_mata();
                $antri_mata->no_antrian = $request->no_antrian;
                $antri_mata->data_pasien_matas_id = $Data_pasien_mata_id;
                $antri_mata->polis_id = $request->id_poli;
                $antri_mata->status =$status;
                $antri_mata->save(); 
                return response() -> json([
                    'pesan' => 'berhasil',
                    'bio' => $antri_mata], 200);
            }
            
           
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
