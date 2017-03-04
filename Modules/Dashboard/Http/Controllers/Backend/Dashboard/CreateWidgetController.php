<?php

namespace Modules\Dashboard\Http\Controllers\Backend\Dashboard;

use Modules\Dashboard\Http\Controllers\Backend\BaseAdminController;
use Modules\Dashboard\Models\Widget;
use Modules\Dashboard\Services\DashboardService;
use Illuminate\Http\Request;

class CreateWidgetController extends BaseAdminController
{
    public function postForm(DashboardService $dashboard, Request $request)
    {
        $component = $request->get('component');
        $grid = $request->get('grid');

        $widget = (new Widget())
            ->fill([
                'component' => $component,
                'grid' => $grid,
            ]);

        if (!$widget->save()) {
            return redirect()->back()
                ->withError('Widget instance wasnt saved properly..');
        }

        if ($dashboard->hasUpdateView($component) !== null) {
            return redirect()->route('admin.widget.update', [
                'admin_widget_id' => $widget->id,
            ])
            ->withInfo('Widget instance created, edit options here.');
        }

        return redirect()->back()
            ->withInfo('Widget Instance Created');
    }

    public function redirect()
    {
        return redirect()->route('admin.config.dashboard');
    }
}
