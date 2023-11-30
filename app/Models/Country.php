<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Country extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes, LogsActivity;
    protected static $logFillable = true;
    public function getActivitylogOptions(): LogOptions{return LogOptions::defaults()->logOnly(['*']);}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'rank',
        'slug',
        'status',
        'user_created',
        'user_updated',
        'alpha_2',
        'alpha_3',
        'title',
        'subtitle',
        'location',
        'icon',
        'content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
        'user_created' => 'integer',
        'user_updated' => 'integer',
        'location' => 'array',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate([
                'table' => 'countries',
                'field' => 'code',
                'length' => 8,
                'prefix' => 'CO',
                'reset_on_prefix_change' => false,
            ]);
        });
        self::creating(function ($model) {
            $model->user_created = auth()->user()->id;
        });
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('small')
        ->width(368);

        $this->addMediaConversion('normal')
        ->width(800);
    }
    public function cities () {
        return $this->hasMany(City::class);
    }
    public function userCreated(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_created');
    }

    public function userUpdated(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_updated');
    }
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
