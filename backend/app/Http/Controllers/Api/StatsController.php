<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StatsController extends Controller
{
    public function registrations(Request $request): JsonResponse
    {
        $request_id = uniqid("req_", true);
        try {
            $validator = Validator::make($request->all(), [
                'month'=> 'integer|min:1|max:12',
                'year' => 'integer|digits:4',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success'       => false,
                    'message'       => $validator->errors()->first(),
                    'request_id'    => $request_id,
                ], 400);
            }

            $month = $request->query('month', date('m'));
            $year = $request->query('year', date('Y'));
    
            $total_registrations = User::getRegistrationsByMonth($month, $year);
    
            $response = new BaseResource(true, 'Total registered data', $total_registrations);
            return $response;

        } catch (\Exception $e) {
            Log::error("[$request_id]". $e->getMessage());

            return response()->json([
                'status'        => false,
                'message'       => 'Internal server error',
                'request_id'    => $request_id,
            ], 500);
        }
    }

    public function deposits(Request $request): JsonResponse
    {
        $request_id = uniqid("req_", true);
        try {
            $validator = Validator::make($request->all(), [
                'month'=> 'integer|min:1|max:12',
                'year' => 'integer|digits:4',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success'       => false,
                    'message'       => $validator->errors()->first(),
                    'request_id'    => $request_id,
                ], 400);
            }
            
            $month = $request->query('month', date('m'));
            $year = $request->query('year', date('Y'));
    
            $total_deposits = Transaction::GetDepositsByMonth($month, $year);
    
            $response = new BaseResource(true, 'Total deposit data', $total_deposits);
            return $response;

        } catch (\Exception $e) {
            Log::error("[$request_id]". $e->getMessage());
            return response()->json([
                'status'    => false,
                'message'   => 'Internal server error',
                'request_id'=> $request_id,
            ]);
        }
    }
}
