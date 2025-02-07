<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Models\User;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function registrations(Request $request)
    {
        $month = $request->query('month');
        $year = $request->query('year');

        // if input is empty, default to the current month
        if (empty($month)) {
            $month = date('m');
        }

        // if input is empty, default to the current year
        if (empty($year)) {
            $year = date('Y');
        }

        $total_registrations = User::getRegistrationsByMonth($month, $year);

        $response = new BaseResource(true, 'Total registered data', $total_registrations);
        return $response;
    }
}
