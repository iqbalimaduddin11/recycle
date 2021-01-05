<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserDetails($id)
    {
        $user = User::findOrFail($id);
        
        return $this->sendResponse('success', 'Data Berhasil ditampilkan', $user ,201);
    }

    public function setUserDetails(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'nomer' => 'required',
            'alamat' => 'required',
            ]);
            
            if ($validator->fails()) {
                return response($validator->errors());
            }
            
            $userDetail = User::findOrFail($id);
        
        try {
            $userDetail->name = $request->name;
            $userDetail->nomer = $request->nomer;
            $userDetail->alamat = $request->alamat;
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $file = base64_encode(file_get_contents($image));

                $client = new \GuzzleHttp\Client();
                $response = $client->request('POST', 'https://freeimage.host/api/1/upload', [
                    'form_params' => [
                        'key' => '6d207e02198a847aa98d0a2a901485a5',
                        'action' => 'upload',
                        'source' => $file,
                        'format' => 'json'
                    ]
                ]);

                $data = $response->getBody()->getContents();
                $data = json_decode($data);
                $image = $data->image->url;

                $userDetail->avatar = $image;
            }

            $userDetail->save();

            $user = User::where('id',$request->user_id)->with('userdetail')->first();

            return $this->sendResponse('succsess', 'Data Berhasil ditambah', compact('user'), 201);

        } catch (\Exception $th) {
            
            return $this->sendResponse('error', 'Data Gagal ditambah', $th->getMessage(), 500);
        }
    }

    public function updateUser(Request $request, $id) {

        
        
        // $validator = Validator::make($request->all(), [
        //     'name' => 'string',
        //     'nomer' => 'string',
        //     'alamat' => 'string',
        //     'avatar' => 'string',
        //     'email' => 'email|unique:users,email,',
        //     'password' => 'string',
        // ]);
            
        //     if ($validator->fails()) {
        //         return response()->json($validator->errors()->toJson(), 400);
        //     }
        $request->validate([
            'name' => 'required|string',
            'nomer' => 'required|string',
            'alamat' => 'required|string',
            'avatar' => 'required|string',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|string',
        ]);
            
            $user = User::find($id);
            
            $dataRequest = $request->all();
            
            $user->update($dataRequest);


            
        try {
            $user->update($result);

            return $this->sendResponse('success', 'Data Berhasil diupdate', compact('user'), 201);
        } catch (\Exception $th) {
            return $this->sendResponse('error', 'Data Gagal diupdate', null, 500);
        }
    }

}
