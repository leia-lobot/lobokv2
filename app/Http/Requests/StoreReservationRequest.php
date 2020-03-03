<?php

namespace App\Http\Requests;

use App\Reservation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reservation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'date'        => [
                'required',
                'date_format:' . config('panel.date_format')],
            'start_time'  => [
                'required',
                'date_format:' . config('panel.time_format')],
            'stop_time'   => [
                'required',
                'date_format:' . config('panel.time_format')],
            'resource_id' => [
                'required',
                'integer'],
            'company_id'  => [
                'required',
                'integer'],
        ];
    }
}
