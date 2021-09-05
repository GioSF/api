<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\ResourceProfile;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$organizationsData = [
			[
				'slug' => 'setor-memoria-bmmm-hemeroteca',
				'main_name' => 'Setor de Memória da Biblioteca Municipal Murilo Mendes',
				'description' => '<p>A Biblioteca Municipal Murilo Mendes da cidade de Juiz de Fora é uma das mais antigas bibliotecas do estado de Minas Gerais. Inaugurada em 1897, completará 122 anos em dezembro de 2019 e ao longo destes anos constituiu um importante acervo de livros e periódicos. No Setor de Memória está o acervo histórico desta biblioteca centenária que tem contribuído muito para o enriquecimento da pesquisa sobre Juiz de Fora, a região da Zona da Mata e Minas Gerais.</p>
				<p>O acervo de Periódicos é constituído pelos mais importantes jornais que circularam em Juiz de Fora nos séculos XIX e XX como O Pharol (1876-1926), Jornal do Commercio (1896-1934), Correio de Minas (1895-1927), Diário Mercantil (1912-1983), Diário da Tarde (1947-1983) e o Tribuna de Minas (1981- aos dias de hoje). Entre as revistas juizforanas destacamos O Lince, Marília, A Evolução, Razões e a Revista do Instituto Histórico e Geográfico de Juiz de Fora. Uma parte do acervo de periódicos (550.000 imagens) está digitalizada.</p>
				<p>A Coleção Juizforana do Setor preserva a memória bibliográfica dos escritores da cidade, sendo constituída por livros de variados temas como história de Juiz de Fora, patrimônio histórico, literatura entre outros.</p>
				<p>De acordo com os critérios internacionais empregados para qualificar obras raras e/ou antigas, destacamos que no Setor de Memória encontram-se   exemplares dos séculos XVI e XVIII e muitas obras do século XIX, além de edições luxuosas e edições autografadas por personalidades da literatura brasileira.</p>
				<p>Pelo acervo valioso e único na região, a Biblioteca Municipal Murilo Mendes é considerada uma biblioteca de referência em Minas Gerais.</p>',
				'address' => 'Praça Antônio Carlos s/n Centro, Juiz de Fora - MG, 36010-180 (Ao lado do Mercado Municipal)',
				'phone' => '(32) 3690-7053 ou 3690-7049',
				'google_maps_link' => '<div class="iframe">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3705.4923859611704!2d-43.346530785054924!3d-21.761196485606217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x989ca12dffdf5d%3A0xdb9325a8534a1997!2sBiblioteca%20Municipal%20Murilo%20Mendes!5e0!3m2!1spt-BR!2sbr!4v1573848616845!5m2!1spt-BR!2sbr" width="450" height="450" frameborder="0" allowfullscreen=""></iframe>
				</div>',
				'resource_type' => '\\App\\Models\\Organization',
				'resource_id' => '1',
			],
			[
				'slug' => 'pjf-arquivo-hisorico',
				'main_name' => 'Arquivo Histórico de Juiz de Fora',
				'description' => 'O Arquivo Histórico de Juiz de Fora (AHJF) é uma instituição que tem por objetivo o recolhimento, organização, preservação e divulgação de acervos documentais de relevância para a história do município e região, sejam estes de caráter público ou privado. É política do AHJF promover a conscientização e a preservação do patrimônio documental da microrregião de Juiz de Fora, oferecendo assessoria ou seus serviços gratuitamente. ',
				'address' => 'Av. Brasil, 560 - Vitorino Braga, Juiz de Fora - MG, 36052-560',
				'phone' => '+553232143450',
				'google_maps_link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14822.57603014606!2d-43.3440151!3d-21.7553227!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x80864a16a256355d!2sPrefeitura%20Municipal%20de%20Juiz%20de%20Fora%20DICOM-Divis%C3%A3o%20de%20Comunica%C3%A7%C3%B5es!5e0!3m2!1sen!2sbr!4v1630863168911!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
				'resource_type' => '\\App\\Models\\Organization',
				'resource_id' => '2',
			],
		];

		foreach ($organizationsData as $data)
		{
			$organization = new Organization();
			$organization->slug = $data['slug'];
			$organization->description = $data['description'];
			$organization->google_maps_link = $data['google_maps_link'];
			$organization->save();
			
			//Todo: add ResourceProfile related attributes
		}
	}
}
