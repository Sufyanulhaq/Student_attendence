<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'date', 'name'];

    public function LeaveRequest()
    {
        return $this->belongsTo(LeaveRequest::class);
    }
}
