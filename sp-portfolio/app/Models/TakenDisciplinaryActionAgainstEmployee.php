<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakenDisciplinaryActionAgainstEmployee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'taken_disciplinary_action_against_employees';

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deleteBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function getEmployee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }
}