<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        "bitrix_id",
        "title",
        "tenant_id",
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class,"id");
    }

//    public function getResourceKey()
//    {
//        return
//    }
}
