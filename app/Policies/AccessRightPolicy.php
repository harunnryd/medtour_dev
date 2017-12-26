<?php

namespace App\Policies;

use App\Admin;
use App\User;
use App\Models\AccessRight;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessRightPolicy
{
    use HandlesAuthorization;

    //policy untuk role admin
    public function viewAdmin(Admin $admin, AccessRight $accessRight)
    {
        return $admin->role->has === 'admin' && $accessRight->read === true;
    }

    public function createAdmin(Admin $admin)
    {
        return $admin->role->has === 'admin' && $admin->role->accessright->create === true;
    }

    public function updateAdmin(Admin $admin, AccessRight $accessRight)
    {
        return $admin->role->has === 'admin' && $accessRight->update === true;
    }

    public function deleteAdmin(Admin $admin, AccessRight $accessRight)
    {
        return $admin->role->has === 'admin' && $accessRight->delete === true;
    }

    //policy untuk role user
    public function viewUser(User $user, AccessRight $accessRight)
    {
        if ($user->role->has === 'admin' && $accessRight->read === true) {
            return true;
        }
        return $user->role->has === 'user' && $accessRight->read === true;
    }

    public function createUser(User $user)
    {
        if ($user->role->has === 'admin' && $user->role->accessright->create === true) {
            return true;
        }
        return $user->role->has === 'user' && $user->role->accessright->create === false;
    }

    public function updateUser(User $user, AccessRight $accessRight)
    {
        if ($user->role->has === 'admin' && $accessRight->update === true) {
            return true;
        }
        return $user->role->has === 'user' && $accessRight->update === true;
    }

    public function deleteUser(User $user, AccessRight $accessRight)
    {
        if ($user->role->has === 'admin' && $accessRight->delete === true) {
            return true;
        }
        return $user->role->has === 'user' && $accessRight->delete === true;
    }
}
