<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Actuality;
use App\Models\Inscription;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use BezhanSalleh\FilamentShield\Traits\HasFilamentShield;


class User extends Authenticatable implements HasMedia, HasName
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasPermissions, HasRoles, LogsActivity, InteractsWithMedia, Sluggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected static $logFillable = true;
    public function getActivitylogOptions(): LogOptions{return LogOptions::defaults()->logOnly(['*']);}

    protected $fillable = [
        'code',
        'rank',
        'slug',
        'lang',
        'email_verified_at',
        'status',
        'checked_at',
        'user_created',
        'user_updated',
        'last_name',
        'first_name',
        'all_name',
        'email',
        'password',
        'pseudo',
        'phone',
        'address',
        'location',
        'occupation',
        'level',
        'sex',
        'birth_at',
        'birth_place',
        'marital',
        'child',
        'bio',
        'other',
        'country_id',
        'parent_id',
        'all_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'email_verified_at' => 'timestamp',
        'status' => 'boolean',
        'user_created' => 'integer',
        'user_updated' => 'integer',
        'birth_at' => 'timestamp',
        'countrie_id' => 'integer',
        'parent_id' => 'integer',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'fullname'
            ]
        ];
    }

    public function getFullnameAttribute(): string
    {
        return $this->last_name.' '.$this->first_name;
    }

    public function getNameAttribute(): string
    {
        return $this->last_name.' '.$this->first_name;
    }

    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->code = IdGenerator::generate([
                'table' => 'users',
                'field' => 'code',
                'length' => 7,
                'prefix' => 'US',
                'reset_on_prefix_change' => false,
            ]);
        });
        /* self::creating(function ($model) {
            $model->user_created = auth()->user()->id;
        }); */
    }

    public function userCreated(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_created');
    }

    public function userUpdated(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_updated');
    }

    public function childrens():HasMany
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }

    public function actualities():HasMany
    {
        return $this->hasMany(Actuality::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }


}
