<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendenceLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'attendence_logs';


    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
    public function deletedBy()
    {
        return $this->belongsTo(User::class,'deleted_by','id');
    }
    public function getName()
    {
        return $this->belongsTo(User::class,'employee_id','id');
    }
}