<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounts extends Model
{
    use SoftDeletes;
	protected $fillable = [
        'name', 'email', 'phone_no','branch_name','branch_code','account_type','balance','address'
    ];
}
