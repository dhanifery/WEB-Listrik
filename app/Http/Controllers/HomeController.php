<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function dashboard(){
        $laman = 'Dashboard';
        return view('dashboard',compact('laman'));
    }

    public function user(){
        $data = User::get();
        $laman = 'User';

        return view('user.index',compact('data','laman'));
    }

    public function create(){
        $laman = 'Tambah User';

        return view('user.create',compact('laman'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors(($validator));

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);
        return redirect()->route('admin.user')->with('success','Data berhasil ditambahkan');
    }

    public function edit(Request $request,$id){
        $data = User::find($id);
        $laman = 'Edit Data User';


        return view('user.edit', compact('data','laman'));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors(($validator));

        $data['name'] = $request->name;
        $data['email'] = $request->email;

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);
        return redirect()->route('admin.user')->with('success','Data berhasil diupdate');
    }

    public function delete(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }
        return redirect()->route('admin.user')->with('success','Data berhasil dihapus');
    }
}
