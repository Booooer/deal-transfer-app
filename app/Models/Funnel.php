<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funnel extends Model
{
    use HasFactory;

    protected $fillable = [
        "bitrix_id",
        "title",
        "tenant_id"
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class,"id");
    }

    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }
}
