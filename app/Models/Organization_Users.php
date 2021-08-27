<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization_Users extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_organization'];
}
