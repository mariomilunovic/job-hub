<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\BidStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BidStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BidStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BidStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BidStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|BidStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BidStatus extends Model
{
    use HasFactory;

    public function bids()
    {
        return $this->hasMany(Bid::class);

    }
}
