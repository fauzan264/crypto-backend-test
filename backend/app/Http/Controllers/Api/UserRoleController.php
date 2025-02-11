<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaseResource;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request_id = uniqid("req_", true);
        try {
            $validator = Validator::make($request->all(), [
                'name'  => 'required'
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'success'       => false,
                    'message'       => 'Failed to create User Role',
                    'errors'        => $validator->errors(),
                ], 422);
            }
    
            $status = UserRole::storePost($request);
            return (new BaseResource(true, 'User Role create successfully', $status))
                    ->response();   
        } catch (\Exception $e) {
            Log::error("[$request_id]". $e->getMessage());

            return response()->json([
                'status'        => false,
                'message'       => 'Internal server error',
                'request_id'    => $request_id,
            ], 500);
            
        }
    }
}
