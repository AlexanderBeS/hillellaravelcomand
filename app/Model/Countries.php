<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Countries extends Model
{
    protected $table = 'countries';

    protected $fillable = ['name'];

    public function stats(): HasMany
    {
        return $this->hasMany(CovidStat::class);
    }
}
