<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        //
        $data['base_url']= env('API_GATEWAY').'';
        $data['base_investasi']= env('API_GATEWAY').'investasi-service/';

        $data['tnc'] = Cache::get('tnc',function() use($data) {
            $result = Http::get($data['base_url'].'api/tnc')->json();
            Cache::put('tnc', $result, 50);

            return $result;
        });

        // $data['notif'] = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/notification/all')->json();

        View::share('menu', $data);

        view()->composer('*', function ($view) use ($data)
        {
            // if (\Session::get('jwt') != null) {
                # code...
            //     $result = Http::withToken(\Session::get('jwt'))->post($data['base_url'].'api/auth/ping')->json();
            //     if ($result) {
            //         # code...
            //         if ($result['meta']['message'] == 'Token Expired') {
            //             # code...
            //             \Session::put('jwt',$result['data']['token']);

            //         }
            //     }
            //     $data['notif'] = Http::withToken(\Session::get('jwt'))->get($data['base_url'].'api/notification/all?user_id='.@\Session::get('user')['id'])->json();

            //     if ($data['notif']) {
            //         # code...
            //         $notif = 0;
            //         foreach ($data['notif']['data']['notif'] as $key => $value) {
            //             # code...
            //             if ($value['status'] == 0) {
            //                 # code...
            //                 $notif++;
            //             }
            //         }
            //     }
            // }else{
            //     $notif = 0;
            // }

            // $data['notif_count'] = $notif;
            $view->with('auth', \Session::get('user') );
            $view->with('init', $data);

        });
    }
}
