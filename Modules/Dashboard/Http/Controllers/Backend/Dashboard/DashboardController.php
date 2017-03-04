<?php

namespace Modules\Dashboard\Http\Controllers\Backend\Dashboard;

use Modules\Dashboard\Http\Controllers\Backend\BaseAdminController;
use Modules\Dashboard\Services\DashboardService;
use Collective\Html\HtmlBuilder;




class DashboardController extends BaseAdminController
{
//DashboardService $dashboard

    public function getIndex()
    {
        dd($theme);


        //$this->theme->setTitle('Dashboard');
        //$dashboard->loadWidgetAssets();

        /*$builder = app(HtmlBuilder::class);
        $gridLayout = $dashboard->getGridLayout();*/
        /*'gridLayout' => $gridLayout,
            'builder' => $builder,*/

        return $this->setView('admin.dashboard.index', [
        ], 'module');
    }

    public function redirect()
    {
        return redirect(route('pxcms.admin.index'));
    }
}
