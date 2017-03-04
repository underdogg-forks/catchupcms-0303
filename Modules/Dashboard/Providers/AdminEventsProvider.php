<?php

namespace Modules\Dashboard\Providers;

use Modules\Core\Providers\BaseEventsProvider;
use Modules\Core;
use Modules\Admin;
use Cache;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;




class AdminEventsProvider extends BaseEventsProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Modules\Dashboard\Events\ConfigWasSaved' => [
            'Modules\Dashboard\Events\Handlers\SetDebug',
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [

    ];

    /**
     * Register any other events for your application.
     */
    public function boot()
    {
        parent::boot();

        Core\Models\DBConfig::saved(function ($model) {
            Cache::forget('core.config_table');
            event(new Admin\Events\ConfigWasSaved($model->key, $model->value));
        });
    }
}
