<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publicData();
    }

    public function publicData()
    {
        view()->composer('*',function (View $view){
            $uToken= $this->uToken();
            $view->with(compact('uToken'));
        });
    }

    /**
     * Create uToken for each domain
     * @return string
     */
    protected function uToken()
    {
        $url = $_SERVER['HTTP_HOST'];
        // strpos returns boolean
        if (strpos($url , 'https://') !== false){
            $url = str_replace('https://','',$url);
            $uToken = 'uToken_'.explode('.',$url)[0];
        }elseif (strpos($url , 'http://') !== false){
            $url = str_replace('http://','',$url);
            $uToken = 'uToken_'.explode('.',$url)[0];
        }else{
            $uToken = 'uToken_'.explode('.',$url)[0];
        };
        return $uToken;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
