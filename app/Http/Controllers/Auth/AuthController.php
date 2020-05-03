<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authorization(){
        $query = http_build_query([
            'client_id' =>  env('CLIENT_ID'),
            'redirect_uri' => env('REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect(env('AUTHORIZATION_URL').$query);
    }

    public function authorizationCallback(Request $request){

        $http = new Client;

        $response = $http->post(env('GET_TOKEN_URL'), [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'redirect_uri' => env('REDIRECT_URI'),
                'code' => $request->code,
            ],

        ]);

        $access = json_decode((string)$response->getBody());

        if (isset($access->access_token) && $access->access_token) {

            $access_token = $access->access_token;

            $ch = curl_init();
            $url = env('GET_USER');
            $header = array(
                'Authorization: Bearer ' . $access_token
            );

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($result, true);


            $user = User::firstOrCreate(
                ['email' => $response['email']],
                ['password' => Hash::make('gfhjkm'),
                    'token' => $access->access_token]

            );

            $Rres = Auth::login($user);

            return response()->redirectTo(RouteServiceProvider::HOME);
        }
    }

    public function logout() {

        Auth::logout();

        return response()->redirectTo(RouteServiceProvider::HOME);
    }
}
