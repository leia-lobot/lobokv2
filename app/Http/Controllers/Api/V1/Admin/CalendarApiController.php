<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\Admin\CalendarResource;
use App\Reservation;
use App\Resource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarApiController extends Controller
{
    // TODO: Fix this shit

    public function show($id)
    {
        abort_if(Gate::denies('reservation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource = Resource::where('id', $id)->firstOrFail();
        return new CalendarResource($resource);
    }
}
