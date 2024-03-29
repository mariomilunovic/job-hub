<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Bid
 *
 * @property int $id
 * @property string $offer
 * @property int $days
 * @property string $message
 * @property string|null $accepted_at
 * @property string|null $finished_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $bidstatus_id
 * @property int $user_id
 * @property int $job_id
 * @method static \Database\Factories\BidFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bid newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bid query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereAcceptedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereBidstatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $bid_selected_at
 * @property string|null $work_delievered_at
 * @property string|null $work_accepted_at
 * @property string|null $deleted_at
 * @property-read \App\Models\BidStatus $bidstatus
 * @property-read \App\Models\Job $job
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Transaction[] $transactions
 * @property-read int|null $transactions_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereBidSelectedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereWorkAcceptedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bid whereWorkDelieveredAt($value)
 */
class Bid extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function bidstatus()
    {
        return $this->belongsTo(BidStatus::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
