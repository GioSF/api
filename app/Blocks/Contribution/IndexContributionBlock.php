<?php

namespace App\Blocks\Contribution;

use App\Models\Contribution;
use App\Models\User;
use App\Blocks\Block;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class IndexContributionBlock extends Block
{
	public function execute(): Collection
	{
		$user = User::find(request()->user); // Apenas para teste!!!!!
		// $user = request()->user; //checar se o usuário vai estar logado desta forma

		if ($user->isAdmin() || $user->isEditor())
		{
			return Contribution::all();
		}


		if ($user->isContribuidor())
		{
			return Contribution::where('user_id', $user->id)
				->whereNull('parent_contribution_id')
				->where('feedback_admin_status', Contribution::CHANGES_REQUIRED)
				->orderBy('created_at', 'asc')
				->get();
		}

	}

}
