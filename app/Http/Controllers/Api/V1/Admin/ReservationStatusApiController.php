<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationStatusRequest;
use App\Http\Requests\UpdateReservationStatusRequest;
use App\Http\Resources\Admin\ReservationStatusResource;
use App\ReservationStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reservation_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReservationStatusResource(ReservationStatus::all());

    }

    public function store(StoreReservationStatusRequest $request)
    {
        $reservationStatus = ReservationStatus::create($request->all());

        return (new ReservationStatusResource($reservationStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(ReservationStatus $reservationStatus)
    {
        abort_if(Gate::denies('reservation_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReservationStatusResource($reservationStatus);

    }

    public function update(UpdateReservationStatusRequest $request, ReservationStatus $reservationStatus)
    {
        $reservationStatus->update($request->all());

        return (new ReservationStatusResource($reservationStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(ReservationStatus $reservationStatus)
    {
        abort_if(Gate::denies('reservation_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reservationStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
