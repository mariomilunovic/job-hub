<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bid;
use Composer\DependencyResolver\Transaction as DependencyResolverTransaction;

/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property string $amount
 * @property int $from_user_id
 * @property int $to_user_id
 * @property int $type_id
 * @property int|null $bid_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Job[] $jobs
 * @property-read int|null $jobs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereBidId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFromUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereToUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory;

    //protected $fillable = ['amount'];
    protected $guarded = [];

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }

    public function transactiontype()
    {
        return $this->belongsTo(TransactionType::class,'transaction_type_id');
    }

    public function bankaccount()
    {
        return $this->belongsTo(BankAccount::class,'bank_account_id');
    }

    public function paymentmethod()
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }


}
