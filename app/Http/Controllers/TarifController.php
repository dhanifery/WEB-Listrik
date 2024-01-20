<?php

namespace App\Http\Controllers;

use App\Models\TarifListrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TarifController extends Controller
{
    public function tarif(){
        $data  = TarifListrik::get();
        $laman = 'Tarif Listrik';
        return view('tarif_listrik.index',compact('laman','data'));
    }

    public function create(){
        $laman = 'Tambah Data Tarif';

        return view('tarif_listrik.create',compact('laman'));
    }

    public function store(Request $request){
        $validator =  Validator::make($request->all(),[
            'kdTarif' => 'required',
            'beban' => 'required|max:6',
            'tarif_perkwh' => 'required|max:6',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors(($validator));

        $data['kdTarif']        = $request->kdTarif;
        $data['beban']          = $request->beban;
        $data['tarif_perkwh']   = $request->tarif_perkwh;

        TarifListrik::create($data);
        return redirect()->route('admin.tarif')->with('success','Data berhasil ditambahkan');
    }

    public function edit(Request $request,$id){
        $data = TarifListrik::find($id);
        $laman = 'Edit Data Tarif';

        return view('tarif_listrik.edit', compact('data','laman'));
    }
    public function update(Request $request,$id){
        $validator =  Validator::make($request->all(),[
            'kdTarif' => 'required',
            'beban' => 'required|max:6',
            'tarif_perkwh' => 'required|max:6',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors(($validator));

        $data['kdTarif']        = $request->kdTarif;
        $data['beban']          = $request->beban;
        $data['tarif_perkwh']   = $request->tarif_perkwh;

        TarifListrik::whereId($id)->update($data);
        return redirect()->route('admin.tarif')->with('success','Data berhasil diupdate');
    }

    public function delete(Request $request,$id){
        $data = TarifListrik::find($id);

        if($data){
            $data->delete();
        }
        return redirect()->route('admin.tarif')->with('success','Data berhasil dihapus');
    }
}
