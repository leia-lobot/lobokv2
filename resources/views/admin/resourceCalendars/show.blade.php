@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.resourceCalendar.title') . ' - ' . $name }}
    </div>

    <div class="card-body">
        <calendar-component></calendar-component>

    </div>
</div>



@endsection
