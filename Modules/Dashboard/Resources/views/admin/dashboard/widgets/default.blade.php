@extends(partial('admin::admin.dashboard.widgets._partial'))

@section('widget-update-body')
{!! Former::horizontal_open() !!}

    {!! Former::hidden('id') !!}
    {!! Former::text('component')->disabled() !!}
    {!! Former::text('grid') !!}

    <button class="btn-labeled btn btn-success pull-right" type="submit">
        <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span> Save Widget
    </button>

{!! Former::close() !!}
@stop
