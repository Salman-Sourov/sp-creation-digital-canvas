<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    public $timestamps = false;

    protected $fillable = [
        'name_english',
        'name_bangla',
        'father_name_english',
        'father_name_bangla',
        'mother_name_english',
        'mother_name_bangla',
        'spouse_name1',
        'spouse_name2',
        'date_of_birth',
        'gender',
        'marital_status',
        'blood_group',
        'nid',
        'mobile',
        'email',
        'present_address_english',
        'present_address_bangla',
        'permanent_address_bangla',
        'department_id',
        'designation_id',
        'date_of_join',
        'commission_date',
        'promotion_date',
        'telephone_office',
        'telephone_home',
        'pbx',
        'emergency_contact',
        'emergency_relation',
        'employee_photo',
        'employee_sign',
        'status',
        'created_at',
        'created_by',
        'deleted_at',
        'deleted_by',
        'updated_at',
        'updated_by'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by','id');
    }

    public function deleteBy()
    {
        return $this->belongsTo('App\Models\User','deleted_by','id');
    }


    public function getUser()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}