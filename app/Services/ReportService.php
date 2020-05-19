<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ReportService
{

    /**
     * Returns the report data from the database.
     *
     * @return array
     */
    public function getReportData()
    {
        return DB::select("
            SELECT S.measured_at, COUNT(S.id) AS number_of_registrations,
                SUM(S.count) AS daily_capacity, (
                    SELECT SUM(max_capacity) FROM `users` WHERE email_verified_at IS NOT NULL
                    AND isAdmin !=1
                ) AS daily_max_capacity,
                100*SUM(S.count)/ (
                    SELECT SUM(max_capacity) FROM `users` WHERE email_verified_at IS NOT NULL
                    AND isAdmin !=1
                ) AS percentage_capacity,
                SUM(S.is_overcrowded=1) AS number_of_overcrowded_registrations
            FROM `statuses` AS S
            INNER JOIN `users` AS U ON U.id=S.user_id
            WHERE S.measured_at >= '2020-05-01'
            GROUP BY S.measured_at
            ORDER BY S.measured_at ASC
         ");
    }
}
