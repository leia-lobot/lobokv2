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
            ],
            [
                'id'   => '2',
                'name' => 'Confirmed',
            ],
            [
                'id'   => '3',
                'name' => 'Queued',
            ],
        ];

        ReservationStatus::insert($reservationStatuses);
    }
}
