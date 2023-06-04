<?php

namespace App\Providers;

use App\Models\Provider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class OjakBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /* Here is Ojak Custom Blade Directive */
        Blade::directive('nama', function ($params) {
            return "<?php echo $params; ?>";
        });
    }
}
