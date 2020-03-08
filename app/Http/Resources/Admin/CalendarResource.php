<?php

namespace App\Http\Resources\Admin;

use App\Reservation;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarResource extends JsonResource
{
    public function toArray($request)
    {
        // TODO: return calendar object with events array

        $events = collect();
        $resource = $this;
        $reservations = Reservation::where('resource_id',$resource->id)->get();

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

        return $events;
    }
}
