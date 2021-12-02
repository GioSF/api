<?php

namespace App\Blocks\Contribution;

use App\Blocks\Block;
use App\Models\Contribution;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateContributionBlock extends Block
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
			if ($this->contribution->feedback_admin_status == Contribution::CHANGES_REQUIRED)
			{
				$adminDecision = request()->feedback_admin_status;
				$this->contribution->feedback_admin_status = $adminDecision;
				$this->contribution->save();

				return $this->contribution;
			}
		}

		if ($user->isContribuidor() &&
			$this->contribution->feedback_admin_status == Contribution::CHANGES_REQUIRED)
		{
			$newContribution = Contribution::build(
				$request['content'],
				'',
				Contribution::NOT_REVIEWED,
				$user
			);
			$newContribution->contribuable()->associate($this->contribution->contribuable);
			$newContribution->save();
			$this->contribution->parent_contribution_id = $newContribution->id;
			$this->contribution->save();

			return $newContribution;
		}

		return null;
	}

}
