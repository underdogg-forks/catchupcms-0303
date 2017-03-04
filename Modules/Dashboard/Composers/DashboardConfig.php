<?php

namespace Modules\Dashboard\Composers;

use Modules\Dashboard\Services\ConfigService;

class DashboardConfig
{
    protected $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }

    public function listWidgets($view)
    {
        $widgets = $this->configService->getConfigVals('widgets.dashboard');

        if (!count($widgets)) {
            $view->with('widgets', []);

            return;
        }

        $widgets = collect($widgets)->values()->collapse()->mapWithKeys(function ($item) {
            return [$item => $item];
        });

        $view->with('widgets', $widgets);
    }
}
