<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\ServiceProvider;
use App\Message;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function ($view)
        {
            $messages = Message::select('*')->where('sent_to_id',Auth::id())->latest()->get();
            
            $view->with('messages', $messages);
        });

       
    }
}
