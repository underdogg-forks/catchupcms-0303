<?php

namespace Modules\Dashboard\Models;

class WidgetOptions extends BaseModel
{
    public $table = 'dashboard_widget_options';
    public $timestamps = false;

    protected $fillable = ['dashboard_widget_id', 'key', 'value'];
}
