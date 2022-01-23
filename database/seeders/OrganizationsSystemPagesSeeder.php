<?php

namespace Database\Seeders;

use App\Models\SystemPage;
use Illuminate\Database\Seeder;

class OrganizationsSystemPagesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$organization = Organization::slugged('pjf-arquivo-hisorico');

		$systemPages = [
			[
				'slug' => 'landing-page',
				'title' => 'Setor de Memória da Biblioteca Municipal Murilo Mendes',
				'content' => '<p>A Biblioteca Municipal Murilo Mendes da cidade de Juiz de Fora é uma das mais antigas bibliotecas do estado de Minas Gerais. Inaugurada em 1897, ao longo destes anos constituiu um importante acervo de livros e periódicos. No Setor de Memória está o acervo histórico desta biblioteca centenária que muito contribuí para o enriquecimento da pesquisa sobre Juiz de Fora, a região da Zona da Mata e Minas Gerais.</p>',
				'organization_id' => $organization->id,
			],
			[
				'slug' => 'localization',
				'title' => 'Localização',
				'content' => '<h2>Localização</h2>
				<br></br>
				<p>Praça Antônio Carlos s/n</p>
				<p>Centro, Juiz de Fora - MG, 36010-180 (Ao lado do Mercado Municipal)</p>
				<p>Aberto de segunda à sexta de 8:00 às 12:00 e de 14:00 às 18:00</p>
				<p>Telefone para contato: (32) 3690-7053 ou 3690-7049</p>
				<div class="iframe">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3705.4923859611704!2d-43.346530785054924!3d-21.761196485606217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x989ca12dffdf5d%3A0xdb9325a8534a1997!2sBiblioteca%20Municipal%20Murilo%20Mendes!5e0!3m2!1spt-BR!2sbr!4v1573848616845!5m2!1spt-BR!2sbr" width="800" height="600" frameborder="0" allowfullscreen=""></iframe>
				</div>',
				'organization_id' => $organization->id,
			],
			[
				'slug' => 'about',
				'title' => 'Sobre o Projeto',
				'content' => 'landing-page',
				'organization_id' => $organization->id,
			],
		];
		// $systemPage = SystemPage::build()



		$organization = Organization::slugged('setor-memoria-bmmm-hemeroteca');
		$systemPages = [
			[
				'slug' => 'landing-page',
				'title' => 'Arquivo Histórico de Juiz de Fora',
				'content' => 'landing-page',
				'organization_id' => $organization->id,
			],
			[
				'slug' => 'landing-page',
				'title' => 'landing-page',
				'content' => 'landing-page',
				'organization_id' => $organization->id,
			],
			[
				'slug' => 'landing-page',
				'title' => 'landing-page',
				'content' => 'landing-page',
				'organization_id' => $organization->id,
			],
		];
	}
}
