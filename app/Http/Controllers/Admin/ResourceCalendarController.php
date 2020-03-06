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

        $name = $resource->name;

        return view('admin.resourceCalendars.show', compact(['name']));
    }
}
