<?php

namespace App\Models;

use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory, NodeTrait;
    // use Searchable {
    //     Searchable::usesSoftDelete insteadof NodeTrait;
    // }
    protected $fillable = [
        'name',
        'slug',
        'eng_name',
        'parent_id',
        'order',
        'lat',
        'lng'
    ];
    /**
     * getRouteKeyName
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    /**
     * booted
     *
     * @return void
     */
    public static function booted()
    {
        static::creating(function (Model $model) {
            $model->eng_name = $model->slug;
            $prefix = $model->parent ? $model->parent->slug . ' ' : '';
            $model->slug = Str::slug($prefix . $model->slug);
        });
    }
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_area')->withTimestamps();
    }
    // public function toSearchableArray()
    // {
    //     return [
    //         'id' => $this->id,
    //         'slug' => $this->eng_name,
    //         'name' => $this->name,
    //     ];
    // }
}
