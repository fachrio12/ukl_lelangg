<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class barangController extends Controller
{
    public function show()

    {
       return barang::all(); 
    }

    public function detail($id)
     {
        if(barang::where('id_barang', $id)->exists()) 
        {
        $data = DB::table('barang')->where('barang.id_barang', '=', $id)->get();return Response()->json($data);
        }else 
            {
              return Response()->json(['message' => 'Tidak ditemukan' ]);
            } 
     }
       
     public function store(Request $request)
     {
         $validator=Validator::make($request->all(),
          [
        
           'nama_barang' => 'required',
           'tgl_daftar'=>'required',
           'harga_awal'=>'required',
           'deskripsi'=>'required',
        
          ]
        );
            if($validator->fails()) 
            {
            return Response()->json($validator->errors());
            }
              $simpan = barang::create([
              'nama_barang' => $request->nama_barang,
              'tgl_daftar' => $request->tgl_daftar,
              'harga_awal' => $request->harga_awal,
              'deskripsi' => $request->deskripsi,
              ]);
        if($simpan)
        {
        return Response()->json(['status' => 1]);
        }
           else
          {
           return Response()->json(['status' => 0]);
          }
     }

     public function update($id, Request $request)
     {
       $validator=Validator::make($request->all(),
       [
        
        'nama_barang' => 'required',
        'tgl_daftar'=>'required',
        'harga_awal'=>'required',
        'deskripsi'=>'required',
     
       ]
         );
         if($validator->fails()) {
         return Response()->json($validator->errors());
         }
         $ubah = barang::where('id_barang',$id)->update([
            'nama_barang' => $request->nama_barang,
            'tgl_daftar' => $request->tgl_daftar,
            'harga_awal' => $request->harga_awal,
            'deskripsi' => $request->deskripsi,
            ]);
        if($ubah) {
          return Response()->json(['status' => 1]);
         }
           else {
          return Response()->json(['status' => 0]);
           }
       }

       public function destroy($id)
        {
         $hapus = barang::where('id_barang', $id)->delete();
         if($hapus) {
           return Response()->json(['status' => 1]);
          }
            else {
            return Response()->json(['status' => 0]);
            }
       }
}
