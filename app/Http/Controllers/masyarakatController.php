<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\masyarakat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class masyarakatController extends Controller
{
    public function show()

    {
       return masyarakat::all(); 
    }

    public function detail($id)
     {
        if(masyarakat::where('id_masyarakat', $id)->exists()) 
        {
        $data = DB::table('masyarakat')->where('masyarakat.id_masyarakat', '=', $id)->get();return Response()->json($data);
        }else 
            {
              return Response()->json(['message' => 'Tidak ditemukan' ]);
            } 
     }
       
     public function store(Request $request)
     {
         $validator=Validator::make($request->all(),
          [
        
           'nama' => 'required',
           'username'=>'required',
           'password'=>'required',
           'tlp'=>'required',
        
          ]
        );
            if($validator->fails()) 
            {
            return Response()->json($validator->errors());
            }
              $simpan = masyarakat::create([
              'nama' => $request->nama,
              'username' => $request->username,
              'password' => $request->password,
              'tlp' => $request->tlp,
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
        
           'nama' => 'required',
           'username'=>'required',
           'password'=>'required',
           'tlp'=>'required',
     
       ]
         );
         if($validator->fails()) {
         return Response()->json($validator->errors());
         }
         $ubah = masyarakat::where('id_masyarakat',$id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'tlp' => $request->tlp,
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
         $hapus = masyarakat::where('id_masyarakat', $id)->delete();
         if($hapus) {
           return Response()->json(['status' => 1]);
          }
            else {
            return Response()->json(['status' => 0]);
            }
       }
}
