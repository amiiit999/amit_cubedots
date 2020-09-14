<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id','project_id', 'name', 'description'
    ];

    public function children()
    {
        return $this->hasMany('App\Models\Task', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\Task', 'id', 'parent_id');
    }
}
