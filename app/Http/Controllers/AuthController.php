<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (\Session::get('user')) {
            // user value cannot be found in session
            return redirect('/dashboard');
        }
        $data = $this->data;
        return view('auth.login', $data);
    }

    public function go_login(Request $request)
    {
        if (\Session::get('user')) {
            // user value cannot be found in session
            return redirect('/dashboard');
        }
        $data = $this->data;
        $result = Http::post($data['base_url'] . 'api/auth/signin', [
            'email' => $request->email,
            'password' => $request->password,
        ])->json();

        if ($result['status'] == false) {
            # code...

            return redirect()
                ->back()
                ->with('status', $result['message'] . ', ' . @$result['errors'])
                ->withInput();
        }

        $jwt = explode(' ', $result['accessToken']);

        \Session::put('jwt', $jwt[1]);
        \Session::put('user', $result['data']);

        return redirect()->route('koperasi.dashboard');
    }

    public function go_logout(Request $request)
    {
        $data = $this->data;
        # code...
        \Session::flush();

        \Session::put('jwt', null);
        \Session::put('user', null);

        return redirect()->route('login');
    }
}
