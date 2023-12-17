<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '300' );

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $base_koperasi, $base_investasi;
    public $tnc,$data;

    public function __construct()
    {
        $data['base_url']= env('API_GATEWAY').'';


        $this->data = $data;
    }

    public function getData(){
        if (\Session::get('jwt') == null) {
            # code...
            return redirect('login')->send();
        }
        $data = $this->data;

        return $data;
    }
}
