<?php
// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
