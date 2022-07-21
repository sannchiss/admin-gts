<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory;

    protected $table = 'credentials';

    protected $fillable = [
        'name',
        'username',
        'password',
        'email',
        'role',
        'account_txa',
        'account_gts',
        'project_id'
    ];
}
