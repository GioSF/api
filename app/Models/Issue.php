<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
	const DIARIO = 1;
	const SEMANAL = 2;
	const QUINZENAL = 3;
	const MENSAL = 4;
	const BIMESTRAL = 5;
	const TRIMESTRAL = 6;
	const QUADRIMESTRAL = 7;
	const SEMESTRAL = 8;
	const ANUAL = 9;
	const BIENAL = 10;
	const AVULSO = 999;
	const INDETERMINADO = NULL;

	protected $fillable = [
		'title',
		'type',
		'periodicity',
		'original_date',
		'start_date',
		'end_date',
		'number_pages',
		'journal_id'
	];

	protected $casts = [
		'original_date' => 'datetime',
		'start_date' => 'datetime',
		'end_date' => 'datetime',
		'created_at' => 'datetime',
		'updated_at' => 'datetime'
	];

	public function journal()
	{
		return $this->belongsTo(Journal::class);
	}

	public function pages()
	{
		return $this->hasMany(Page::class);
	}
}
