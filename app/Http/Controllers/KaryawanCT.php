<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\ResponseSent;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Response;


class KaryawanCT extends Controller
{
    public function all(){

        $responseSent = new ResponseSent();
        $karyawan = new Karyawan;
        $karyawan = $karyawan->all();

        return $responseSent->sendResponse('success', $karyawan, 'success get data');
    }

    public function detail(Request $request){

        $nik = $request->input('nik');
        
        $responseSent = new ResponseSent();

        if($nik != null){

            $karyawan = new Karyawan;
            $karyawan = $karyawan->where('nik', $nik)->first();

            if($karyawan != null){

                return $responseSent->sendResponse('success', $karyawan, 'success delete data');

            }else{

                return $responseSent->sendResponse('failed', null, 'karyawan not exist');    
                
            }


        }else{
            return $responseSent->sendResponse('failed', null, 'invalid parameter');
        }
    }

    public function insert(Request $request){

        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $alamat = $request->input('alamat');
        $gaji = $request->input('gaji');
        
        $responseSent = new ResponseSent();

        if($nik != null && $nama != null && $tanggal_lahir != null && $alamat != null && $gaji != null){

            $karyawan = new Karyawan;

            $karyawan = $karyawan->where('nik', $nik)->first();

            if($karyawan == null){

                $karyawan = new Karyawan;
                
                $karyawan['nik'] = $nik;
                $karyawan['nama'] = $nama;
                $karyawan['tanggal_lahir'] = $tanggal_lahir;
                $karyawan['alamat'] = $alamat;
                $karyawan['gaji'] = $gaji;
                $karyawan->save();

                return $responseSent->sendResponse('success', $karyawan, 'success insert data');
            }else{
                return $responseSent->sendResponse('failed', null, 'nik has exist');
            }


        }else{
            return $responseSent->sendResponse('failed', null, 'invalid parameter');
        }        

    }

    public function update(Request $request){

        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $alamat = $request->input('alamat');
        $gaji = $request->input('gaji');
        
        $responseSent = new ResponseSent();

        if($nik != null && $nama != null && $tanggal_lahir != null && $alamat != null && $gaji != null){

            $karyawan = new Karyawan;
            $karyawan = $karyawan->where('nik', $nik)->first();

            if($karyawan != null){

                $karyawan['nik'] = $nik;
                $karyawan['nama'] = $nama;
                $karyawan['tanggal_lahir'] = $tanggal_lahir;
                $karyawan['alamat'] = $alamat;
                $karyawan['gaji'] = $gaji;
                $karyawan->save();

                return $responseSent->sendResponse('success', $karyawan, 'success update data');

            }else{

                return $responseSent->sendResponse('failed', null, 'karyawan not exist');    

            }


        }else{
            return $responseSent->sendResponse('failed', null, 'invalid parameter');
        }
        
    }


    public function delete(Request $request){

        $nik = $request->input('nik');
        
        $responseSent = new ResponseSent();

        if($nik != null){

            $karyawan = new Karyawan;
            $karyawan = $karyawan->where('nik', $nik)->first();

            if($karyawan != null){

                $karyawan->delete();

                return $responseSent->sendResponse('success', $karyawan, 'success delete data');

            }else{

                return $responseSent->sendResponse('failed', null, 'karyawan not exist');    
                
            }


        }else{
            return $responseSent->sendResponse('failed', null, 'invalid parameter');
        }
        
    }




}
