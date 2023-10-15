<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 */
class PackageStatus extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'created_at', 'updated_at'];
}
