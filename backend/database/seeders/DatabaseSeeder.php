<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionStatus;
use App\Models\TransactionTypes;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try
        {
            UserStatus::insert([
                [
                    "name"          => "active",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "name"          => "inactive",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "name"          => "banned",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "name"          => "pending",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ]
            ]);

            UserRole::insert([
                [
                    "id"            => "fe3141e7-937c-4298-9b47-ab509d806226",
                    "name"          => "admin",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "id"            => "d9b5390c-f4ba-4235-b1e3-40c70a5f2dfd",
                    "name"          => "user",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ]
            ]);
            
            dump(userRole::all());

            TransactionTypes::insert([
                [
                    "name"          => "deposit",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "name"          => "withdraw",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ]
            ]);

            TransactionStatus::insert([
                [
                    "name"          => "pending",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "name"          => "processing",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "name"          => "success",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ],
                [
                    "name"          => "failed",
                    "created_at"    => now(),
                    "created_by"    => "00000000-0000-0000-0000-000000000000",
                ]
            ]);
            
            
            
            User::factory(10)->create();
            Transaction::factory(40)->create();

            DB::commit();
        } catch(\Throwable $throw)
        {
            Log::error("Seeder gagal: " . $throw->getMessage());
            DB::rollBack();
        }
    }
}
