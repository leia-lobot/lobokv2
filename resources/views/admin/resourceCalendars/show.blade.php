@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.resourceCalendar.title') . ' - ' . $name }}
    </div>

    <div class="card-body">
        <example-component calendarEvents="{{ json_encode($events) }}"></example-component>

    </div>
</div>



@endsection
