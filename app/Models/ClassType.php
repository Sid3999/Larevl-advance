<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    use HasFactory;
    public function SceduledClasses()
    {
        return $this->hasMany(SceduleClasses::class);
    }
}
