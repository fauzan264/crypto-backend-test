<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRole extends Model
{
    use HasUuids;
    protected $primaryKey = "id";
    protected $keyType = "string";
    protected $table = "user_roles";
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ["id", "name", "created_by", "updated_by"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, "user_role_id", "id");
    }
}
