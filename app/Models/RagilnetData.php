<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $phone_number
 * @property string $email
 * @property string $instagram
 * @property string $instagram_link
 * @property string $facebook
 * @property string $facebook_link
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 */
class RagilnetData extends Model
{
    protected $table="ragilnet_datas";
    /**
     * @var array
     */
    protected $fillable = ['phone_number', 'email', 'instagram', 'instagram_link', 'facebook', 'facebook_link', 'address', 'created_at', 'updated_at'];
}
