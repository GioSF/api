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
		$listaPeriodicos = $this->getListaPeriodicos();

		foreach ($listaPeriodicos as $item)
		{
			$journal = new Journal();
			$journal->title = $item['title'];
			$journal->initials = $item['initials'];
			$journal->localization = $item['localization'];
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
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Correio de J. Fora (1)',
				'initials' => 'CJF1',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Correio de J. Fora (2)',
				'initials' => 'CJF2',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Correio de Minas',
				'initials' => 'CM',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Correio da Tarde',
				'initials' => 'CT',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'A Democracia',
				'initials' => 'DE',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Diário da Manhã',
				'initials' => 'DH',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'O Dia',
				'initials' => 'DI',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Diário de Minas',
				'initials' => 'DM',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Diário do Povo',
				'initials' => 'DP',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Gazeta de Juiz de Fora',
				'initials' => 'GJF',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Gazeta da Tarde',
				'initials' => 'GT',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Jornal do Commercio',
				'initials' => 'JC',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Juiz de Fora',
				'initials' => 'JF',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Lar Católico',
				'initials' => 'LC',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'O Lidador',
				'initials' => 'LI',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Minas Livre',
				'initials' => 'ML',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Parahybuna',
				'initials' => 'PA',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'A Propaganda',
				'initials' => 'PR',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Regeneração',
				'initials' => 'RE',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Diário da Tarde (1)',
				'initials' => 'DT1',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Diário da Tarde (2)',
				'initials' => 'DT2',
				'format_type' => '1',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'O Lince',
				'initials' => 'OLIN',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Evolução',
				'initials' => 'EVOL',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Marília',
				'initials' => 'MARI',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Luz',
				'initials' => 'LUZ',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Silhueta',
				'initials' => 'SI',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Panorama',
				'initials' => 'PN',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Diário Mercantil',
				'initials' => 'DM',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Gazeta Commercial',
				'initials' => 'GC',
				'format_type' => '2',
				'localization' => 'Juiz de Fora, MG',
			],
			[
				'title' => 'Sem Informação',
				'initials' => NULL,
				'format_type' => NULL,
				'localization' => 'Juiz de Fora, MG',
			],
		];
	}
}
