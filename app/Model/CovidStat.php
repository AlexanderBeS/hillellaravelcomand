<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CovidStat
 * @package App\Model
 *
 * @property int $ill_num
 * @property int $death_num
 * @property int $good_num
 */
class CovidStat extends Model
{
    public function country(): BelongsTo
    {
        return $this->belongsTo(Countries::class);
    }
}
