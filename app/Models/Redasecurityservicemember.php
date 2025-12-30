<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redasecurityservicemember extends Model
{
    protected $table = 'reda_security_service_members';

    protected $fillable = [
        'etf_no', 'fullname', 'gender', 'nationality', 'nic_no', 'address',
        'workplace', 'salary_bank_branch_no', 'acc_no', 'telephone', 'picture',
        'date_joined', 'date_resigned', 'ds_division', 'gn_division', 'police_division',
        'marital_status', 'spouse_name', 'no_of_children', 'education_qualifications',
        'experience', 'position_category',
    ];
}
