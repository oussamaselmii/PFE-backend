<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            
            
            
        ]);

        $user =new User;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        
        
        

        $user->save();

        $http = new Client;

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => '8fzvyul5CmSbotO8C1eqbfGOp6x0A7UnuKiJNwaz',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);


        return json_decode((string) $response->getBody(), true);

    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422
            ], 422);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422
            ], 422);
        }
        if(Hash::check($request->password,$user->password)){
            $http = new Client;

            $response = $http->post(url('oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => '8fzvyul5CmSbotO8C1eqbfGOp6x0A7UnuKiJNwaz',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);
            return response(['data'=>json_decode((string) $response->getBody(), true),]);
        }
    }

}
