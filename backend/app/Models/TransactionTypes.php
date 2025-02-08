<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionTypes extends Model
{
    use HasUuids;
    protected $primaryKey = "name";
    protected $keyType = "string";
    protected $table = "transaction_types";
    public $timestamps = true;

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, "type", "name");
    }
}
