<?php

namespace App\Http\Controllers;

use App\Penjemputan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjemputanController extends Controller
{
    public function createPenjemputan(Request $request, Penjemputan $penjemputan, $id)
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
        
            try {
            $penjemputan->user_id = $id;
            $penjemputan->name = $request->name;
            $penjemputan->nomer = $request->nomer;
            $penjemputan->keterangan = $request->keterangan;
            $penjemputan->alamat = $request->alamat;

            $penjemputan->save();

            $penjemputan = Penjemputan::where('user_id',$id)->with('user')->first();

            return $this->sendResponse('succsess', 'Data Berhasil ditambah', compact('penjemputan'), 201);

        } catch (\Exception $th) {
            
            return $this->sendResponse('error', 'Data Gagal ditambah', $th->getMessage(), 500);
        }
    }

    public function addPenjemputan(Request $request, Penjemputan $penjemputan)
    {
        $validator = Validator::make($request->all(), [
            'status' => '0,1,2',
        ]);

        if ($validator->fails()) {
            return response($validator->errors());
        }

        $penjemputan->status = $request->status;

        
        try {
            $penjemputan->save();

            return $this->sendResponse('success', 'status penjemputan telah dikonfirmasi', $penjemputan, 200);
        } catch (\Exception $th) {
            return $this->sendResponse('error', 'status penjemputan gagal dikonfirmasi', $th->getMessage(), 500);
        }
    }

    // public function approvePenjemputan()
    // {

    // }
    
}
