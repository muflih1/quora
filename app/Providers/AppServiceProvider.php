<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('placeholder_image', 'https://scontent.fccj9-1.fna.fbcdn.net/v/t1.30497-1/143086968_2856368904622192_1959732218791162458_n.png?_nc_cat=1&ccb=1-7&_nc_sid=7206a8&_nc_ohc=w00aZTzGsUcAX86JzfA&_nc_oc=AQn7T32hR2lNwZ4XfLfQuycdxTZVpPg-ICEZWKyD7LLKpqH6sTqBG23yFXhBcSYxR_A&_nc_ht=scontent.fccj9-1.fna&oh=00_AfC7smis_3E2-Reb9vGmFo5XbMPfiQ5s5iTkETaHMobBCA&oe=647C6DB8');
    }
}
