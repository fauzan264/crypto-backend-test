<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRole extends Model
{
    use HasUuids;
    protected $primaryKey = "id";
    protected $keyType = "uuid";
    protected $table = "user_roles";
    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, "user_role_id", "id");
    }
}
