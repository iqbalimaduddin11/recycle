<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjemputanController extends Controller
{
    public function createPenjemputan(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'nomer' => 'string',
            'keterangan' => 'string',
            'alamat' => 'string',
            ]);
            
            if ($validator->fails()) {
                return response($validator->errors());
            }
            
            $Penjemputan = User::findOrFail($id);
        
        try {
            $Penjemputan->name = $request->name;
            $Penjemputan->nomer = $request->nomer;
            $Penjemputan->keterangan = $request->keterangan;
            $Penjemputan->alamat = $request->alamat;

            $Penjemputan->save();

            // $user = User::where('id',$request->user_id)->with('userdetail')->first();

            return $this->sendResponse('succsess', 'Data Berhasil ditambah', compact('user'), 201);

        } catch (\Exception $th) {
            
            return $this->sendResponse('error', 'Data Gagal ditambah', $th->getMessage(), 500);
        }
    }
    
}
