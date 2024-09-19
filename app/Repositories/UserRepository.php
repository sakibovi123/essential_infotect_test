<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAllPatients()
    {
        return User::where('role', 'patient')
            ->where('id', '!=', auth()->id())
            ->get();
    }

    public function approvePatient($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();
    }

    public function rejectPatient($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function deductPoints($id, $points)
    {
        $user = User::findOrFail($id);
        $user->points -= $points;
        $user->save();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }
}
