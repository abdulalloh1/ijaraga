<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function ($builder) {
            $builder->orderBy('id', 'desc');
        });
    }

    public function getCreatedAtAttribute($value)
    {
        $carbon = Carbon::parse($value);

        return $carbon->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        $carbon = Carbon::parse($value);

        return $carbon->format('Y-m-d H:i:s');
    }
}
