<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSystemFunction extends Model
{
    use HasFactory;

    protected $fillable = ['id_system_functions', 'id_organization'];
}
