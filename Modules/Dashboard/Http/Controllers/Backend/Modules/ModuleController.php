<?php

namespace Modules\Dashboard\Http\Controllers\Backend\Modules;

use Modules\Dashboard\Datatables\ModuleManager;
use Modules\Dashboard\Http\Controllers\Backend\BaseAdminController;
use Modules\Dashboard\Traits\DataTableTrait;
use Modules\Core\Models\Module;

class ModuleController extends BaseAdminController
{
    use DataTableTrait;

    public function manager()
    {
        return $this->renderDataTable(with(new ModuleManager())->boot());
    }

    public static function postEnableModule($module)
    {
        if (in_array('core-module', $model->keywords)) {
            return app()->abort(401);
        }

        try {
            app('modules')->find($module->alias)->enable();
        } catch (Exception $e) {
            throw new ModelNotFoundException();
        }
    }

    public static function postDisableModule($module)
    {
        if (in_array('core-module', $model->keywords)) {
            return app()->abort(401);
        }

        try {
            app('modules')->find($module->alias)->disable();
        } catch (Exception $e) {
            throw new ModelNotFoundException();
        }
    }
}
