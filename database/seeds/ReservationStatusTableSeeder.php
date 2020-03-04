<?php

use App\ReservationStatus;
use Illuminate\Database\Seeder;

class ReservationStatusTableSeeder extends Seeder
{
    public function run()
    {
        $reservationStatuses = [
            [
                'id'   => '1',
                'name' => 'Pending',
                'color' => '#dc3545',
            ],
            [
                'id'   => '2',
                'name' => 'Confirmed',
                'color' => '#28a745',
            ],
            [
                'id'   => '3',
                'name' => 'Queued',
                'color' => '#ffc107',
            ],
        ];

        ReservationStatus::insert($reservationStatuses);
    }
}
