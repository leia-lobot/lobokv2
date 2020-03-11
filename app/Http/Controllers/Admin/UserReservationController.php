<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReservationRequest;
use App\Http\Requests\StoreUserReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Reservation;
use App\Resource;
use App\ReservationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserReservationController extends Controller
{
    public function create()
    {
        abort_if(Gate::denies('reservation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();

        $resources = Resource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = $user->companies()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ReservationStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.user-reservations.create', compact('resources', 'companies', 'statuses'));
    }

    public function store(StoreUserReservationRequest $request)
    {

        $reservation = Reservation::create($request->all());

        return redirect()->route('admin.resource-calendars.show', ['resource_calendar' => $reservation->resource_id]);
    }

    public function edit(Reservation $reservation)
    {
        abort_if(Gate::denies('reservation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resources = Resource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Company::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = ReservationStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reservation->load('resource', 'company', 'status');

        return view('admin.user-reservations.edit', compact('resources', 'companies', 'reservation', 'statuses'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->all());

        return redirect()->back();
    }

    public function show(Reservation $reservation)
    {
        abort_if(Gate::denies('reservation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservation->load('resource', 'company', 'status');

        return view('admin.user-reservations.show', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        abort_if(Gate::denies('reservation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservation->delete();

        return back();
    }

    public function massDestroy(MassDestroyReservationRequest $request)
    {
        Reservation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
