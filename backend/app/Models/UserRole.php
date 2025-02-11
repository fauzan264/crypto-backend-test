<?php

namespace App\Models;

use Illuminate\Support\Str;
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
    protected $fillable = ["name", "created_at", "created_by", "updated_at", "updated_by"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, "user_role_id", "id");
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
