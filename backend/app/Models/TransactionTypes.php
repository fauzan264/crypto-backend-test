<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionTypes extends Model
{
    use HasUuids;
    protected $primaryKey = "name";
    protected $keyType = "string";
    protected $table = "transaction_types";
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ["name", "created_at", "created_by", "updated_at", "updated_by"];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, "type", "name");
    }

    public static function storePost($request)
    {
        return self::create([
            'id'            => Str::uuid(),
            'name'          => $request->name,
            'created_by'    => '00000000-0000-0000-0000-000000000000',
        ]);
    }
}
