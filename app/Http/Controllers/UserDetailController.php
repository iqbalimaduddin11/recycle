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
    public function getUser($id)
    {
        $user = User::findOrFail($id);
        
        return $this->sendResponse('success', 'Data Berhasil ditampilkan', $user ,201);
    }

    // public function setUser(Request $request, $id)
    // {
        
    //     $validator = Validator::make($request->all(), [
    //         'user_id' => 'required',
    //         'nomer' => 'required',
    //         'alamat' => 'required',
    //         ]);
            
    //         if ($validator->fails()) {
    //             return response($validator->errors());
    //         }
            
    //         $userDetail = User::findOrFail($id);
        
    //     try {
    //         $userDetail->name = $request->name;
    //         $userDetail->nomer = $request->nomer;
    //         $userDetail->alamat = $request->alamat;
    //         if ($request->hasFile('avatar')) {
    //             $image = $request->file('avatar');
    //             $file = base64_encode(file_get_contents($image));

    //             $client = new \GuzzleHttp\Client();
    //             $response = $client->request('POST', 'https://freeimage.host/api/1/upload', [
    //                 'form_params' => [
    //                     'key' => '6d207e02198a847aa98d0a2a901485a5',
    //                     'action' => 'upload',
    //                     'source' => $file,
    //                     'format' => 'json'
    //                 ]
    //             ]);

    //             $data = $response->getBody()->getContents();
    //             $data = json_decode($data);
    //             $image = $data->image->url;

    //             $userDetail->avatar = $image;
    //         }

    //         $userDetail->save();

    //         $user = User::where('id',$request->user_id)->with('userdetail')->first();

    //         return $this->sendResponse('succsess', 'Data Berhasil ditambah', compact('user'), 201);

    //     } catch (\Exception $th) {
            
    //         return $this->sendResponse('error', 'Data Gagal ditambah', $th->getMessage(), 500);
    //     }
    // }

    public function updateUser(Request $request, $id) {

        
        $request->validate([
            'name' => 'required|string',
            'nomer' => 'required|string',
            'alamat' => 'required|string',
            'avatar' => 'required|string',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|string',
        ]);
            
            $user = User::find($id);
            $dataRequest = $request->except(['avatar']);
        $dataResult = array_filter($dataRequest);
        $avatar = $request->file('avatar');
        if ($avatar) {
            # code...
            $file = base64_encode(file_get_contents($avatar));

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

            $user->avatar = $image;
        }else
        $avatar = $request->avatar;
            $dataResult = array_filter($dataRequest);
            
        try {
            
            $user->update($dataResult);
            // dd($user);

            return $this->sendResponse('success', 'Data Berhasil diupdate', compact('user'), 201);
        } catch (\Exception $th) {
            return $this->sendResponse('error', 'Data Gagal diupdate', null, 500);
        }
    }

    public

    public function destroyUser(Request $request) 
    {
        $password = $request->password;

        $user = User::findOrFail($request->user_id);

        if (Hash::check($password, $user->password)) {
            try {
                $user->delete();

                return $this->sendResponse('success', 'Akun Dihapus', null, 200);
            } catch (\Throwable $th) {
                return $this->sendResponse('error', 'Akun Gagal Dihapus', null, 404);
            }
        } else {
            return $this->sendResponse('error', 'Password Salah', null, 404);
        }

    }

}
