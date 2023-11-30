<?php

namespace App\Models;

use App\Models\User;
use App\Models\Year;
use App\Models\Paiement;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Inscription extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable, SoftDeletes, LogsActivity;
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }
    protected $fillable = [
        'code',
        'rank',
        'slug',
        'lang',

        'user_created',
        'user_updated',
        'student_id',
        'classe_id',

        'montant',
        'total_paiement',
        'content',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_created' => 'integer',
        'user_updated' => 'integer',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate([
                'table' => 'inscriptions',
                'field' => 'code',
                'length' => 7,
                'prefix' => 'INS',
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

    public function userCreated(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_created');
    }
    public function userUpdated(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_updated');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function classe(): BelongsTo
    {
        return $this->belongsTo(Classe::class);
    }

    public function paiements(): HasMany
    {
        return $this->hasMany(Paiement::class);
    }

}
