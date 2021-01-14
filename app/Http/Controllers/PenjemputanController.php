<?php

namespace App\Http\Controllers;

use App\Penjemputan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenjemputanController extends Controller
{
    public function getPenjemputan()
    {
        $penjemputan = Penjemputan::where('user_id', Auth::user()->id)->with('user')->get();

        return $this->sendResponse('success', 'Data Berhasil diambil', $penjemputan, 200);

    }
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
            $penjemputan->status = $request->status;

            $penjemputan->save();

            return $this->sendResponse('succsess', 'Data Berhasil ditambah', compact('penjemputan'), 201);

        } catch (\Exception $th) {
            
            return $this->sendResponse('error', 'Data Gagal ditambah', $th->getMessage(), 500);
        }
    }

    // public function addPenjemputan(Request $request,  Penjemputan $penjemputan)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'string',
    //         'nomer' => 'string',
    //         'keterangan' => 'string',
    //         'alamat' => 'string',
    //         'status' => '0'
    //     ]);

    //     if ($validator->fails()) {
    //         return response($validator->errors());
    //     }

    //     $penjemputan->name = $request->name;
    //     $penjemputan->nomer = $request->nomer;
    //     $penjemputan->keterangan = $request->keterangan;
    //     $penjemputan->alamat = $request->alamat;
    //     $penjemputan->status = $request->status;

        
    //     try {
    //         $penjemputan->save();

    //         return $this->sendResponse('success', 'Menunggu Konfirmasi', $penjemputan, 200);
    //     } catch (\Exception $th) {
    //         return $this->sendResponse('error', 'Gagak Menunggu Konfirmasi', $th->getMessage(), 500);
    //     }
    // }

    public function setStatusPenjemputan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'in:0,1,2'
        ]);
            
        if ($validator->fails()) {
            return response($validator->errors());
        }

        $penjemputan = Penjemputan::find($id);

        if (!$penjemputan) {
            return $this->sendResponse('error', 'Data penjemputan tidak ada', null, 404);
        }

        $penjemputan->status = $request->status;

        try {
            $penjemputan->save();

            return $this->sendResponse('success', 'Status Selesai', $penjemputan, 200);
        } catch (\Exception $th) {
            return $this->sendResponse('error', 'Status Gagal', $th->getMessage(), 500);
        }
    }
    
}
