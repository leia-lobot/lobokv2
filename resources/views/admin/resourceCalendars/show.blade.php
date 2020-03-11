@extends('layouts.admin')
@section('content')

@can('reservation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.user-reservations.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.reservation.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.resourceCalendar.title') . ' - ' . $name }}
    </div>

    <div class="card-body">
        <calendar-component></calendar-component>

    </div>
</div>



@endsection
