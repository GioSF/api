<?php

namespace App\Policies;

use App\Models\Contribution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContributionPolicy
{
	use HandlesAuthorization;

	/**
	 * Determine whether the user can view any models.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function viewAny(User $user)
	{
		$contributorCanViewAny = $user->isContribuidor() &&
							$contribution->belongsToUser($user);

		return $user->isAdmin() || $user->isEditor() ||
				$contributorCanViewAny;
	}

	/**
	 * Determine whether the user can view the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Contribution  $contribution
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function view(User $user, Contribution $contribution)
	{
		$contributorCanView = $user->isContribuidor() &&
							$contribution->belongsToUser($user);

		return $user->isAdmin() || $user->isEditor() ||
				$contributorCanView;
	}

	/**
	 * Determine whether the user can create models.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function create(User $user)
	{
		return true;
	}

	/**
	 * Determine whether the user can update the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Contribution  $contribution
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function update(User $user, Contribution $contribution)
	{
		$contributorCanUpdate = $user->isContribuidor() &&
							$contribution->belongsToUser($user) &&
							$contribution->feedback_admin_status == Contribution::CHANGES_REQUIRED;

		return $user->isAdmin() || $user->isEditor() ||
				$contributorCanUpdate;
	}

	/**
	 * Determine whether the user can delete the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Contribution  $contribution
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function delete(User $user, Contribution $contribution)
	{
		return $user->isAdmin() || $user->isEditor();
	}

	/**
	 * Determine whether the user can restore the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Contribution  $contribution
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function restore(User $user, Contribution $contribution)
	{
		return $user->isAdmin() || $user->isEditor();
	}

	/**
	 * Determine whether the user can permanently delete the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\Contribution  $contribution
	 * @return \Illuminate\Auth\Access\Response|bool
	 */
	public function forceDelete(User $user, Contribution $contribution)
	{
		return $user->isAdmin();
	}
}
