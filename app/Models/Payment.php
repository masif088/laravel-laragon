<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $no_reference
 * @property string $on_behalf
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property Transaction[] $transactions
 */
class Payment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'no_reference', 'on_behalf', 'note', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
