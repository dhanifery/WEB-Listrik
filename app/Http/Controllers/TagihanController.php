<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\TarifListrik;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function tagihan(){
        $laman  = 'Data Tagihan';
        $data   = Tagihan::get(); 

        return view('tagihan.index',compact('laman','data'));
    }


    public function delete(Request $request,$id){
        $data = Tagihan::find($id);

        if($data){
            $data->delete();
        }
        return redirect()->route('admin.tagihan')->with('success','Data berhasil ditambahkan');
    }

    public function rinci(Request $request,$id){
        $data = Tagihan::find($id);
        $data2 = Pelanggan::find($data->pelanggan_id);
        $data3 = TarifListrik::find($data2->tarifListrik_id);
        // dd($data3);
        $laman = 'Rinci Tagihan';

        return view('tagihan.rinci',compact('laman','data' ,'data3'));
    }
}
