<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $package_status_id
 * @property string $title
 * @property integer $price
 * @property string $description
 * @property string $short_description
 * @property string $created_at
 * @property string $updated_at
 * @property PackageStatus $packageStatus
 * @property Transaction[] $transactions
 */
class Package extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['package_status_id', 'title', 'price', 'description', 'short_description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function packageStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\PackageStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
