<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserStatus extends Model
{
    use HasUuids;
    protected $primaryKey = "name";
    protected $keyType = "string";
    protected $table = "user_status";
    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserStatus::class, "status", "name");
    }
}
