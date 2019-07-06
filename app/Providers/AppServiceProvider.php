<?php

namespace App\Providers;

use App\Models\Portfolio;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Jorenvh\Share\Share;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        $this->publicData();
    }

    public function publicData()
    {
        view()->composer('*',function (View $view){
            $uToken= $this->uToken();
            $portfolioInfo = $this->portfolio();
            $view->with(compact('uToken','portfolioInfo'));
        });
    }
    public function portfolio()
    {
        $uToken= $this->uToken();
        $portfolioInfo = Portfolio::where('uToken', $uToken)->first();
        if (!$portfolioInfo) {
            // For user first login, replicate a default data and assign to user's uToken
            $portfolioInfo = Portfolio::where('uToken', 'default')->first()->replicate();
            $portfolioInfo->uToken = $uToken;
            $portfolioInfo->save();
        }
//        $portfolioInfo['details'] = array_reverse($portfolioInfo->details);
//        dd(json_decode($portfolioInfo));
        return $portfolioInfo;
    }
    /**
     * Create uToken for each domain
     * @return string
     */
    protected function uToken()
    {
        $url = $_SERVER['HTTP_HOST'];
//         strpos returns boolean
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
