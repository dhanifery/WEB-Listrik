<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\TarifListrik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function pelanggan(){
        $laman  = 'Data Pelanggan';
        $data   = Pelanggan::get(); 

        return view('pelanggan.index',compact('laman','data'));
    }

    public function create(){
        $laman = 'Tambah Pelanggan';
        $id_pelanggan = strtoupper(Str::random(3)).date('Ymd');
        $tarif = TarifListrik::get();

        return view('pelanggan.create',compact('laman','id_pelanggan','tarif'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'tarifListrik_id' => 'required',
            'pelanggan_id' => 'required',
            'nama_pelanggan' => 'required|max:40',
            'alamat' => 'required|max:50',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors(($validator));

        $data['tarifListrik_id']    = $request->tarifListrik_id;
        $data['pelanggan_id']       = $request->pelanggan_id;
        $data['nama_pelanggan']     = $request->nama_pelanggan;
        $data['alamat']             = $request->alamat;

        $data3 =  Pelanggan::create($data);
        
        if($data3){
            if ($data3->tarifListrik_id == 1) {
                $data2['pelanggan_id']    = $data3->id;
                $data2['tahun_tagihan']   = $data3->tarif['tarif_perkwh']*((4*30)*12);
                $data2['bulan_tagihan']   = $data3->tarif['tarif_perkwh']*(4*30);
                $data2['pemakaian']       = (4*30);
                Tagihan::create($data2);
            }elseif ($data3->tarifListrik_id == 2) {
                $data2['pelanggan_id']    = $data3->id;
                $data2['tahun_tagihan']   = $data3->tarif['tarif_perkwh']*((7*30)*12);
                $data2['bulan_tagihan']   = $data3->tarif['tarif_perkwh']*(7*30);
                $data2['pemakaian']       = (7*30);
                Tagihan::create($data2);
            }elseif ($data3->tarifListrik_id == 3) {
                $data2['pelanggan_id']    = $data3->id;
                $data2['tahun_tagihan']   = $data3->tarif['tarif_perkwh']*((10*30)*12);
                $data2['bulan_tagihan']   = $data3->tarif['tarif_perkwh']*(10*30);
                $data2['pemakaian']       = (10*30);
                Tagihan::create($data2);
            }elseif ($data3->tarifListrik_id == 4) {
                $data2['pelanggan_id']    = $data3->id;
                $data2['tahun_tagihan']   = $data3->tarif['tarif_perkwh']*((15*30)*12);
                $data2['bulan_tagihan']   = $data3->tarif['tarif_perkwh']*(15*30);
                $data2['pemakaian']       = (15*30);
                Tagihan::create($data2);
            }elseif ($data3->tarifListrik_id == 5) {
                $data2['pelanggan_id']    = $data3->id;
                $data2['tahun_tagihan']   = $data3->tarif['tarif_perkwh']*((20*30)*12);
                $data2['bulan_tagihan']   = $data3->tarif['tarif_perkwh']*(20*30);
                $data2['pemakaian']       = (20*30);
                Tagihan::create($data2);
            }
        }
        return redirect()->route('admin.pelanggan')->with('success','Data berhasil ditambahkan');
    }

    public function edit(Request $request,$id){
        $data = Pelanggan::find($id);
        $tarif = TarifListrik::get();

        $laman = 'Edit Data Pelanggan';

        return view('pelanggan.edit', compact('data','laman','tarif'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'tarifListrik_id' => 'required',
            'pelanggan_id' => 'required',
            'nama_pelanggan' => 'required|max:40',
            'alamat' => 'required|max:50',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors(($validator));

        $data['tarifListrik_id']    = $request->tarifListrik_id;
        $data['pelanggan_id']       = $request->pelanggan_id;
        $data['nama_pelanggan']     = $request->nama_pelanggan;
        $data['alamat']             = $request->alamat;

        Pelanggan::whereId($id)->update($data);
        return redirect()->route('admin.pelanggan')->with('success','Data berhasil diupdate');
    }

    public function delete(Request $request,$id){
        $data = Pelanggan::find($id);

        if($data){
            $data->tagih()->delete();
            $data->delete();
        }
        return redirect()->route('admin.pelanggan')->with('success','Data berhasil dihapus');
    }
}
