<?php

namespace App\Models;

use App\Traits\AppOrdered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes, AppOrdered;
    protected $fillable = [
        'uuid',
        'user_id',
        'team_id',
        'title',
        'platform1',
        'platform2',
        'platform3',
        'platform4',
        'platform5',

    ];
    protected $hidden = [
        'deleted_at',
    ];


    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * team
     *
     * @return void
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }


    /**
     * tags
     *
     * @return void
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tag')->withTimestamps();
    }
    /**
     * areas
     *
     * @return void
     */
    public function areas()
    {
        return $this->belongsToMany(Area::class, 'task_area')->withTimestamps();
    }
    /**
     * types
     *
     * @return void
     */
    public function types()
    {
        return $this->belongsToMany(Type::class, 'task_type')->withTimestamps();
    }

    public function getYoutubeAtrribute()
    {
        return $this->platform1;
    }
}
