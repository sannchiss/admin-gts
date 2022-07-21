<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $table = 'clients';

    protected $fillable = [
        'account_txa',
        'nif',
        'name_company',
        'account_gts',
        'created_at',

    ];

}
