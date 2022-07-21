<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'applicante_name',
        'customer_type',
        'customer_tracking_gts',
        'name_company',
        'nif',
        'account_txa',
        'customer_address',
        'customer_city',
        'user_name',
        'user_rut',
        'user_phone',
        'user_email',
        'proposed_date',
        'type_service',
        'type_of_impression',
        'documentary_return',
        'type_of_integration',
        'printer_property',
        'computer_property',
        'migrated_to_txa',
        'inhouse',
        'created_at',
        'updated_at'
    ];




}
