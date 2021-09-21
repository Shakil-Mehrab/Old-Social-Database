<?php

namespace App\Models;

use App\Traits\AppOrdered;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, SoftDeletes, AppOrdered;
    protected $fillable = [
        'uuid',
        'name',
    ];
    protected $hidden = [
        'deleted_at',
    ];
    /**
     * toSearchableArray
     *
     * @return void
     */

    /**
     * tasks
     *
     * @return void
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_tag')->withTimestamps();
    }
}
