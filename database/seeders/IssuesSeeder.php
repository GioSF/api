<?php

namespace Database\Seeds;

use App\Models\Issue;
use App\Models\Page;
use App\Models\Journal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;

class IssuesSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// As named on config/filesystems.php
		$acervo = Storage::disk('acervo');
		$folderPath = $acervo->path('');
		$originalDirList = $acervo->allDirectories();
		$newDirList = [];
		$filesystem = new Filesystem;

		foreach ($originalDirList as $origDir)
		{
			$folderpath = $folderPath . $origDir;

			if (! empty($filesystem->files($folderpath)))
			{
				$siglaPeriodico = null;
				$ano = null;
				$mes = null;
				$dia = null;
				$arrDir = explode('/', $origDir);

				if (count($arrDir) == 3)
				{
					list($siglaPeriodico, $ano, $mes) = $arrDir;
				}
				elseif (count($arrDir) == 4)
				{
					list($siglaPeriodico, $ano, $mes, $dia) = $arrDir;
				}

				$periodico = Journal::where('initials', $siglaPeriodico)->first();
				$datas = $this->obterDatas($dia, $mes, $ano);
				$issue = new Issue;
				$issue->journal_id = $periodico->id;
				$issue->title = $datas['inicio']->format('d_m_Y');
				$issue->number_pages = count($filesystem->files($folderpath));
				$issue->periodicity = $this->obterPeriodicidadeIssue($datas);
				$issue->original_date = $origDir;
				$issue->start_date = $datas['inicio'];
				$issue->end_date = $datas['termino'];
				$issue->save();
				$files = $filesystem->files($folderpath);

				foreach ($files as $file)
				{
					$fileName = $file->getRelativePathname();
					$numero = null;
					if (str_contains($fileName, '.jpg'))
					{
						$numero = str_replace('.jpg', '', $file->getRelativePathname());
					}
					if (str_contains($fileName, '.JPG'))
					{
						$numero = str_replace('.JPG', '', $file->getRelativePathname());
					}
	
					$filepath = $origDir;
					$page = new Page;
					$page->page_number = $numero;
					$page->filepath = $filepath . '/' . $file->getRelativePathname();
					// $page->content = $this->getOCR($folderpath . '/' . $file->getRelativePathname());
					$page->issue_id = $issue->id;
					$page->save();
				}
			}
		}
	}

	private function getOCR(string $filepath)
	{
		$texto = shell_exec('tesseract ' . $filepath . ' stdout');
		return rtrim ($texto, '\n\r');		
	}

	private function obterDatas(? string $dias = null, ? string $meses = null, string $anos): array
	{
		$diaInicio = null;
		$diaTermino = null;
		$mesInicio = null;
		$mesTermino = null;
		$anoInicio = null;
		$anoTermino = null;
		$datas = [];

		if ($anos)
		{
			if (is_numeric($anos))
			{
				$anoInicio = $anos;
				$anoTermino = $anos;
			}
			else
			{
				$arrAnos = null;
				if (str_contains($anos, ' e '))
				{
					$arrAnos = explode(' e ', $anos);
				}
				if (str_contains($meses, ' a '))
				{
					$arrAnos = explode(' a ', $anos);
				}
				$anoInicio = $arrAnos[0];
				$anoTermino = $arrAnos[1];
			}
		}
		if ($meses)
		{
			if (is_numeric($meses))
			{
				$mesInicio = $meses;
				$mesTermino = $meses;
			}
			else
			{
				$arrMeses = null;
				if (str_contains($meses, ' e '))
				{
					$arrMeses = explode(' e ', $meses);
				}
				if (str_contains($meses, ' a '))
				{
					$arrMeses = explode(' a ', $meses);
				}
				$mesInicio = $arrMeses[0];
				$mesTermino = $arrMeses[1];
			}
		}		
		if ($dias)
		{
			if (is_numeric($dias))
			{
				$diaInicio = $dias;
				$diaTermino = $dias;
			}
			else
			{
				$arrDias = null;
				if (str_contains($dias, ' e '))
				{
					$arrDias = explode(' e ', $dias);
				}
				if (str_contains($dias, ' a '))
				{
					$arrDias = explode(' a ', $dias);
				}
				if (str_contains($dias, '1') && str_contains($dias, 'quinzena'))
				{
					$arrDias = ['1', 'quinzena'];
				}
				if (str_contains($dias, '2') && str_contains($dias, 'quinzena'))
				{
					$arrDias = ['2', 'quinzena'];
				}
				if (str_contains($dias, ' de '))
				{
					if (str_contains($dias, ' e '))
					{
						$arrDias = explode(' e ', $dias);
					}
					if (str_contains($dias, ' a '))
					{
						$arrDias = explode(' a ', $dias);
					}
					$arrDias[1] = substr($arrDias[1], 0, 2);
				}
				$diaInicio = $arrDias[0];
				$diaTermino = $arrDias[1];
			}
		}

		if ($dias && $meses && $anos)
		{
			if ($diaTermino == 'quinzena')
			{
				if ($diaInicio == 1)
				{
					$datas =  [
						'inicio' => \Carbon\Carbon::create($anoInicio, $mesInicio, 1),
						'termino' => \Carbon\Carbon::create($anoTermino, $mesTermino, 14),
					];
				}
				else
				{
					$datas =  [
						'inicio' => \Carbon\Carbon::create($anoInicio, $mesInicio, 15),
						'termino' => \Carbon\Carbon::create($anoTermino, $mesTermino, \Carbon\Carbon::create($anoTermino, $mesTermino)->endOfMonth()->day),
					];
				}
			}
			else
			{
				$datas =  [
					'inicio' => \Carbon\Carbon::create($anoInicio, $mesInicio, $diaInicio),
					'termino' => \Carbon\Carbon::create($anoTermino, $mesTermino, $diaTermino),
				];
			}
		}

		if (! $dias && $meses && $anos)
		{
			$datas =  [
				'inicio' => \Carbon\Carbon::create($anoInicio, $mesInicio, 1),
				'termino' => \Carbon\Carbon::create($anoTermino, $mesTermino,
				\Carbon\Carbon::create($anoTermino, $mesTermino)->endOfMonth()->day),
			];
		}

		if (! $dias && ! $meses && $anos)
		{
			$datas =  [
				'inicio' => \Carbon\Carbon::create($anoInicio, 1, 1),
				'termino' => \Carbon\Carbon::create($anoTermino, 12, 31),
			];
		}

		return $datas;
	}

	private function obterPeriodicidadeIssue(array $datas): int
	{
		$intervaloDias = $datas['inicio']->diffInDays($datas['termino']);
		$intervaloMeses = $datas['inicio']->diffInMonths($datas['termino']);
		$intervaloAnos = $datas['inicio']->diffInYears($datas['termino']);
		$intervaloId = null;
	
		switch ($intervaloDias) {
			case '0':
				$intervaloId = Issue::DIARIO;
				break;
			case '7':
				$intervaloId = Issue::SEMANAL;
				break;
			case '13':
				$intervaloId = Issue::QUINZENAL;
				break;
			case '14':
				$intervaloId = Issue::QUINZENAL;
				break;
			case '15':
				$intervaloId = Issue::QUINZENAL;
				break;
			case '16':
				$intervaloId = Issue::QUINZENAL;
				break;
			default:
				break;
		}

		if ($intervaloDias > 17)
		{
			switch ($intervaloMeses) {
				case '0':
					$intervaloId = Issue::MENSAL;
					break;
				case '1':
					$intervaloId = Issue::BIMESTRAL;
					break;
				case '2':
					$intervaloId = Issue::TRIMESTRAL;
					break;
				case '3':
					$intervaloId = Issue::QUADRIMESTRAL;
					break;
				default:
					break;
			}
		}
		if ($intervaloDias > 120)
		{
			switch ($intervaloAnos) {
				case '0':
					$intervaloId = Issue::ANUAL;
					break;
				case '1':
					$intervaloId = Issue::BIENAL;
					break;
				default:
					break;
			}
		}

		return $intervaloId;
	}
}
