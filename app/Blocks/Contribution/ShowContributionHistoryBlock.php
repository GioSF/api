<?php

namespace App\Blocks\Contribution;

use App\Blocks\Block;
use App\Models\Contribution;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShowContributionHistoryBlock extends Block
{
	private $contribution;

	public function __construct(Contribution $contribution)
	{
		$this->contribution = $contribution;
	}

	public function execute()
	{
		$request = request()->all();
		$user = User::find($request['user']); // Apenas para teste!!!!!
		// $user = request()->user; //checar se o usuário vai estar logado desta forma

		if ($user->isAdmin() || $user->isEditor())
		{
			$contributions = Contribution::where('parent_contribution_id', $this->contribution->id)
				->get();
		}

		if ($user->isContribuidor())
		{
			$contributions = Contribution::where('parent_contribution_id', $this->contribution->id)
				->where('user_id', $user->id)
				->get();
		}
	}
}
