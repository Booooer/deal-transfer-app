<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
      "bitrix_id"
    ];

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    public function funnels(): HasMany
    {
        return $this->hasMany(Funnel::class);
    }

    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }
}
