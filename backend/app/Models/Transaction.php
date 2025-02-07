<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'deposit_id',
        'asset',
        'amount',
        'type',
        'status',
        'created_by',
        'updated_by',
    ];

    public static function GetDepositsByMonth($month, $year)
    {
        $query = self::selectRaw("YEAR(created_at) as year, MONTH(created_at) as month, COUNT(id) as total")
                    ->whereRaw("MONTH(created_at) = ? AND YEAR(created_at) = ? AND type = 'deposit'", [$month, $year])
                    ->groupByRaw("YEAR(created_at), MONTH(created_at)")
                    ->get();

        return $query;
    }
}
