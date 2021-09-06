<?php

namespace Database\Seeders;

use App\Models\Journal;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalsSeeder extends Seeder
{
	public function __construct()
	{
	}

	public function run()
	{
		$journal = new Journal();
		$journal->title = 'Sem Informação';
		$journal->initials = NULL;
		$journal->format_type = NULL;
		$journal->save();

		$listaPeriodicos = $this->getListaPeriodicos();

		foreach ($listaPeriodicos as $item)
		{
			$journal = new Journal();
			$journal->title = $item['title'];
			$journal->initials = $item['initials'];
			$journal->format_type = $item['format_type'];
			$journal->save();
		}
	}

	private function getListaPeriodicos()
	{
		return [
			[
				'title' => 'Actualidade',
				'initials' => 'AC',
				'format_type' => '1',
			],
			[
				'title' => 'Correio de J. Fora (1)',
				'initials' => 'CJF1',
				'format_type' => '1',
			],
			[
				'title' => 'Correio de J. Fora (2)',
				'initials' => 'CJF2',
				'format_type' => '1',
			],
			[
				'title' => 'Correio de Minas',
				'initials' => 'CM',
				'format_type' => '1',
			],
			[
				'title' => 'Correio da Tarde',
				'initials' => 'CT',
				'format_type' => '1',
			],
			[
				'title' => 'A Democracia',
				'initials' => 'DE',
				'format_type' => '1',
			],
			[
				'title' => 'Diário da Manhã',
				'initials' => 'DH',
				'format_type' => '1',
			],
			[
				'title' => 'O Dia',
				'initials' => 'DI',
				'format_type' => '1',
			],
			[
				'title' => 'Diário de Minas',
				'initials' => 'DM',
				'format_type' => '1',
			],
			[
				'title' => 'Diário do Povo',
				'initials' => 'DP',
				'format_type' => '1',
			],
			[
				'title' => 'Gazeta de Juiz de Fora',
				'initials' => 'GJF',
				'format_type' => '1',
			],
			[
				'title' => 'Gazeta da Tarde',
				'initials' => 'GT',
				'format_type' => '1',
			],
			[
				'title' => 'Jornal do Commercio',
				'initials' => 'JC',
				'format_type' => '1',
			],
			[
				'title' => 'Juiz de Fora',
				'initials' => 'JF',
				'format_type' => '1',
			],
			[
				'title' => 'Lar Católico',
				'initials' => 'LC',
				'format_type' => '1',
			],
			[
				'title' => 'O Lidador',
				'initials' => 'LI',
				'format_type' => '1',
			],
			[
				'title' => 'Minas Livre',
				'initials' => 'ML',
				'format_type' => '1',
			],
			[
				'title' => 'Parahybuna',
				'initials' => 'PA',
				'format_type' => '1',
			],
			[
				'title' => 'A Propaganda',
				'initials' => 'PR',
				'format_type' => '1',
			],
			[
				'title' => 'Regeneração',
				'initials' => 'RE',
				'format_type' => '1',
			],
			[
				'title' => 'Diário da Tarde (1)',
				'initials' => 'DT1',
				'format_type' => '1',
			],
			[
				'title' => 'Diário da Tarde (2)',
				'initials' => 'DT2',
				'format_type' => '1',
			],
			[
				'title' => 'O Lince',
				'initials' => 'OLIN',
				'format_type' => '2',
			],
			[
				'title' => 'Evolução',
				'initials' => 'EVOL',
				'format_type' => '2',
			],
			[
				'title' => 'Marília',
				'initials' => 'MARI',
				'format_type' => '2',
			],
			[
				'title' => 'Luz',
				'initials' => 'LUZ',
				'format_type' => '2',
			],
			[
				'title' => 'Silhueta',
				'initials' => 'SI',
				'format_type' => '2',
			],
			[
				'title' => 'Panorama',
				'initials' => 'PN',
				'format_type' => '2',
			],
			[
				'title' => 'Diário Mercantil',
				'initials' => 'DM',
				'format_type' => '2',
			],
			[
				'title' => 'Gazeta Commercial',
				'initials' => 'GC',
				'format_type' => '2',
			],

		];
	}
}
