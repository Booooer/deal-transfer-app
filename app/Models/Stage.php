<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'bitrix_id',
        'funnel_id'
    ];

    public function funnel(): BelongsTo
    {
        return $this->belongsTo(Funnel::class,'funnel_id','id');
    }

    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }
}
