<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JobStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\JobStatusFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JobStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JobStatus extends Model
{
    use HasFactory;
}
