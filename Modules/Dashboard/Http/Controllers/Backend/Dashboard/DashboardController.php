<?php

namespace Modules\Admin\Http\Controllers\Backend\Dashboard;

use Modules\Admin\Http\Controllers\Backend\BaseAdminController;
use Modules\Admin\Services\DashboardService;
use Collective\Html\HtmlBuilder;

class DashboardController extends BaseAdminController
{
    public function getIndex(DashboardService $dashboard)
    {
        $this->theme->setTitle('Dashboard');
        $dashboard->loadWidgetAssets();

        $builder = app(HtmlBuilder::class);
        $gridLayout = $dashboard->getGridLayout();

        return $this->setView('admin.dashboard.index', [
            'gridLayout' => $gridLayout,
            'builder' => $builder,
        ], 'module');
    }

    public function redirect()
    {
        return redirect(route('pxcms.admin.index'));
    }
}
