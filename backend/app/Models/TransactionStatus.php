<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionStatus extends Model
{
    use HasUuids;
    protected $primarykey = "name";
    protected $keyType = "string";
    protected $table = "transaction_status";
    public $timestamps = true;

    public function transaction(): BelongsTo
    {
        return $this->belongsTo("transaction_status", "status", "name");
    }
}
