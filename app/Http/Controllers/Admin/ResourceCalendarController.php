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
        $reservations = Reservation::where('resource_id', $id)->with('company')->get();
        $events = collect();

        foreach ($reservations as $reservation) {
            $start = $reservation->date . ' ' . $reservation->start_time;

            $events->push([
                'title' => $reservation->company->name,
                'start' => \Carbon\Carbon::createFromFormat(config('panel.datetime_format'),$start)->format('Y-m-d'),
                'url' => url('admin/reservations').'/'.$reservation->id.'/edit'
            ]);
        }

        $name = $resource->name;

        return view('admin.resourceCalendars.show', compact(['events', 'name']));
    }
}
