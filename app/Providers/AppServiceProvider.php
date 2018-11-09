<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::directive('COP', function ($money) {
            return '<?php echo number_format($money,2,",","."); ?>';
        });
        Blade::directive('USD', function ($money) {
            return "<?php echo number_format($money, 2) * 3000; ?>";
        });
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
