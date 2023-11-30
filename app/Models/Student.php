<?php

namespace App\Models;

use App\Models\User;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Actuality;
use App\Models\Inscription;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Model;
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

class Student extends Model implements HasMedia, HasName
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasPermissions, LogsActivity, InteractsWithMedia, Sluggable;
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
        'lang',
        'email_verified_at',
        'status',
        'password',
        'checked_at',
        'user_created',
        'user_updated',

        'last_name',
        'first_name',
        'all_name',
        'email',
        'content',
        'orphelin',
        'activity_group',
        'job_parent',
        'type_parent',
        'religion',
        'church',

        'desc',
        'phone',
        'address',
        'date_enter',
        'location',
        'level',
        'sex',
        'birth_at',
        'birth_place',
        'bio',
        'other',
        'country_id',
        'parent_id',
        'orph',
        'habita',
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
                'table' => 'students',
                'field' => 'code',
                'length' => 6,
                'prefix' => 'ENF',
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
        return $this->hasMany(Student::class, 'parent_id', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'parent_id');
    }

    public function inscriptions(): HasMany
    {
        return $this->hasMany(Inscription::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

}
