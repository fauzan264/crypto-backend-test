<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;
use NumberFormatter;

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
        $query = self::selectRaw("MONTH(created_at) as month, YEAR(created_at) as year, SUM(amount) as total")
                    ->whereRaw("MONTH(created_at) = ? AND YEAR(created_at) = ? AND type = 'deposit'", [$month, $year])
                    ->groupByRaw("YEAR(created_at), MONTH(created_at)")
                    ->first();

        $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
        $query->total = $formatter->formatCurrency($query->total, "IDR");

        return $query;
    }
}
