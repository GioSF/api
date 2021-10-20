<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
		'file_path', 'content',
	];

    public function documentable()
	{
		return $this->morphTo();
	}
}
