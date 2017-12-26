<?php

namespace App\Policies;

use App\User;
use App\Admin;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    // ini untuk Admin
    public function adminAccess(Admin $admin, Role $role) {
        return $admin->role_id === 1 && $role->has === 'admin';
    }

    // ini untuk User
    public function doctorAccess(User $user, Role $role) {
        return $user->role_id === 2 && $role->has === 'doctor';
    }

    public function userAccess(User $user, Role $role) {
        if ($user->role_id === 1 && $role->has === 'admin') return true;
        return $user->role_id === 3 && $role->has === 'user';
    }
}
