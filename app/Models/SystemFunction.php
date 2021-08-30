<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemFunction extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function organizations(){
        return $this->belongsToMany(Organization::class, 'organization_system_functions', 'id_system_function', 'id_organization');
    }
}
