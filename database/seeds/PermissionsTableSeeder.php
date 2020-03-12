<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '18',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '19',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '20',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '21',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '22',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '23',
                'title' => 'lobok_access',
            ],
            [
                'id'    => '24',
                'title' => 'resource_create',
            ],
            [
                'id'    => '25',
                'title' => 'resource_edit',
            ],
            [
                'id'    => '26',
                'title' => 'resource_show',
            ],
            [
                'id'    => '27',
                'title' => 'resource_delete',
            ],
            [
                'id'    => '28',
                'title' => 'resource_access',
            ],
            [
                'id'    => '29',
                'title' => 'reservation_create',
            ],
            [
                'id'    => '30',
                'title' => 'reservation_edit',
            ],
            [
                'id'    => '31',
                'title' => 'reservation_show',
            ],
            [
                'id'    => '32',
                'title' => 'reservation_delete',
            ],
            [
                'id'    => '33',
                'title' => 'reservation_access',
            ],
            [
                'id'    => '34',
                'title' => 'company_create',
            ],
            [
                'id'    => '35',
                'title' => 'company_edit',
            ],
            [
                'id'    => '36',
                'title' => 'company_show',
            ],
            [
                'id'    => '37',
                'title' => 'company_delete',
            ],
            [
                'id'    => '38',
                'title' => 'company_access',
            ],
            [
                'id'    => '39',
                'title' => 'reservation_status_create',
            ],
            [
                'id'    => '40',
                'title' => 'reservation_status_edit',
            ],
            [
                'id'    => '41',
                'title' => 'reservation_status_show',
            ],
            [
                'id'    => '42',
                'title' => 'reservation_status_delete',
            ],
            [
                'id'    => '43',
                'title' => 'reservation_status_access',
            ],
            [
                'id'    => '44',
                'title' => 'schedule_access',
            ],
            [
                'id'    => '45',
                'title' => 'booking_access',
            ],
            [
                'id'    => '46',
                'title' => 'my_calendar_access',
            ],
            [
                'id'    => '47',
                'title' => 'resource_calendar_access',
            ],
            [
                'id'    => '48',
                'title' => 'my_account_access',
            ],
            [
                'id'    => '49',
                'title' => 'profile_access',
            ],
            [
                'id'    => '50',
                'title' => 'change_password_access',
            ],
            [
                'id'    => '51',
                'title' => 'client_reservation_create',
            ],
            [
                'id'    => '52',
                'title' => 'client_reservation_edit',
            ],
            [
                'id'    => '53',
                'title' => 'client_reservation_show',
            ],
            [
                'id'    => '54',
                'title' => 'client_reservation_delete',
            ],
            [
                'id'    => '55',
                'title' => 'client_reservation_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
