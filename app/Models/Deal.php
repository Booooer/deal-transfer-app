<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'bitrix_id',
        'responsible_id',
        'who_transfered',
        'tenant_id',
        'stage_id',
        'old_stage_id',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class,'id');
    }

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class,'id');
    }

}
