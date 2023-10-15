<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $package_id
 * @property integer $payment_id
 * @property integer $transaction_status_id
 * @property string $date_payment
 * @property integer $money
 * @property string $date_start
 * @property string $date_end
 * @property string $no_invoice
 * @property string $created_at
 * @property string $updated_at
 * @property string $thumbnail
 * @property Package $package
 * @property Payment $payment
 * @property TransactionStatus $transactionStatus
 * @property User $user
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'package_id', 'payment_id', 'transaction_status_id', 'date_payment', 'money', 'date_start', 'date_end', 'no_invoice', 'created_at', 'updated_at', 'thumbnail'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Package');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Payment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactionStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\TransactionStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
