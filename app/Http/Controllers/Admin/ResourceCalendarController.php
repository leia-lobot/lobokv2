<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use App\Reservation;
use App\Resource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResourceCalendarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('resource_calendar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resourceCalendars.index');
    }

    public function show($id)
    {

        $resource = Resource::where('id', $id)->firstOrFail();
        $reservations = Reservation::where('resource_id', $id)->with('company', 'status')->get();
        $events = collect();

        foreach ($reservations as $reservation) {
            $start = $reservation->date . ' ' . $reservation->start_time;
            $end = $reservation->date . ' ' . $reservation->stop_time;

            $events->push([
                'title' => $reservation->company->name,
                'start' => \Carbon\Carbon::createFromFormat(config('panel.datetime_format'), $start)->format('Y-m-d H:i:s'),
                'end' => \Carbon\Carbon::createFromFormat(config('panel.datetime_format'), $end)->format('Y-m-d H:i:s'),
                'backgroundColor' => $reservation->status->color,

            ]);
        }

        $name = $resource->name;

        return view('admin.resourceCalendars.show', compact(['events', 'name']));
    }
}
