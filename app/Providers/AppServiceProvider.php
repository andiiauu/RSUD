<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Obat;
use App\Supplier;
use Illuminate\Support\Facades\Schema;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      require_once app_path().'/Helpers/helpers.php';
      require_once app_path().'/Helpers/date_time.php';

      Schema::defaultStringLength(191);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
