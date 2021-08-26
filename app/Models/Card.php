<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
		'subject', 'journal_id', 'date_issue', 'duration_issue', 'abstract', 'comment', 'issue',
	];
}
