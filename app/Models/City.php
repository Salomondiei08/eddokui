<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'rank',
        'slug',
        'name',
        'user_created',
        'user_updated',

    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate([
                'table' => 'countries',
                'field' => 'code',
                'length' => 8,
                'prefix' => 'CI',
                'reset_on_prefix_change' => false,
            ]);
        });
        self::creating(function ($model) {
            $model->user_created = auth()->user()->id;
        });
    }
    public function country() {
        return $this->belongsTo(Country::class);
    }
}
