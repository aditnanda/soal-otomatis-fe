<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function dashboard(){
        $data = $this->getData();
        $data['user'] = \Session::get('user');

        $result = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/generate-results')->json();
        $data['generate_otomatis'] = @$result['count'] ?? 0;

        $result = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/questions')->json();
        $data['bank_soal'] = @$result['count'] ?? 0;

        return view('dashboard.index',$data);
    }


}
