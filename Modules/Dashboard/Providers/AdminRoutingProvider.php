<?php

namespace Modules\Dashboard\Providers;

use Modules\Dashboard\Models\Widget;
use Modules\Core\Models\Module;
use Modules\Core\Models\Navigation;
use Modules\Core\Models\NavigationLink;
use Modules\Core\Providers\CmsRoutingProvider;
use Illuminate\Support\Facades\Route;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;



class AdminRoutingProvider extends CmsRoutingProvider
{
    protected $namespace = 'Modules\Dashboard\Http\Controllers';

    /**
     * Define your module's route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        Route::bind('admin_module_name', function ($id) {
            return (new Module())->findOrFail($id);
        });

        Route::bind('admin_nav_name', function ($name) {
            return (new Navigation())
                ->with('links')
                ->where('name', $name)
                ->firstOrFail();
        });

        Route::bind('admin_link_id', function ($id) {
            return (new NavigationLink())->findOrFail($id);
        });

        Route::bind('admin_widget_id', function ($id) {
            return (new Widget())
                ->with('options')
                ->findOrFail($id);
        });
    }



    /**
     * @return string
     */
    protected function getFrontendRoute()
    {
        return __DIR__.'/../Routes/routes-frontend.php';
    }

    /**
     * @return string
     */
    protected function getBackendRoute()
    {
        return __DIR__.'/../Routes/routes-backend.php';
    }

    /**
     * @return string
     */
    protected function getApiRoute()
    {
        return __DIR__.'/../Routes/routes-api.php';
    }
}
