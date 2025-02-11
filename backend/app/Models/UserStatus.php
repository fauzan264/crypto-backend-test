<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserStatus extends Model
{
    protected $primaryKey = "name";
    protected $keyType = "string";
    protected $table = "user_status";
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = ["name", "created_at", "created_by", "updated_at", "updated_by"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserStatus::class, "status", "name");
    }

    public static function storePost($request)
    {
        return self::create([
            'name'          => $request->name,
            'created_by'    => '00000000-0000-0000-0000-000000000000',
        ]);
    }
}
