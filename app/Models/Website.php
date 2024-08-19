<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
