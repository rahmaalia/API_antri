<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;


class UserController extends Controller
{
    public function getuser(Dokter $dokter)
    {
        $userr = User::all();
        return response() -> json([
            'pesan' => 'berhasil',
            'bio' => $userr], 200);
    }

    public $successStatus = 200; 
    public function login()
    {
        if(Auth::attempt(['username'=> request('username'),
        'password'=> request('password')])){
            $user = Auth::user();

            $success = $user -> createToken ('MyApp')
            -> accessToken;
            return response() -> json([
            'status' =>true,
            'data'=>$user,
            'token'=>$success],
             $this -> successStatus);

        }
        else{
            return response()->json([
                'status'=>false,
                'error' => 'User Tidak Ditemukan',
        ]); 
        }
    }

   
    public function register (Request $request)
    {
        $input['nama'] =$request->nama;
        $input['username'] =$request->username;
        $input['no_telp'] =$request->no_telp;
        $input['password'] =$request->password;
        $data=array('nama' => 'required',
        'username' => 'required|unique:users,username',
        'no_telp' => 'required',
        'password' => 'required',
    );
        $validator = Validator::make($input,$data);

        if($validator ->fails()) {
            return response()->json([
                'status'=>false,
                'error' => 'Username Telah Terdaftar',
        ]); 
        }
        else {

             $input = $request ->all();
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input);
        $success=  $user->createToken('MyApp')-> accessToken;
        return response() -> json([
            'status' =>true,
            'token'=>$success],
             $this -> successStatus);
        }

    }

    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 

    public function update(request $request, $id){
        $nama = $request->nama;
        $no_telp = $request->no_telp;

        $edit = User::find($id);
        $edit->nama = $nama;
        $edit->no_telp = $no_telp;
        $edit->save();
        return response() -> json([
            'status' =>true,
            'token'=>$edit]);




    }

    
}
