<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'date', 'name', 'attendence'];
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

}
