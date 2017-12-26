<?php

namespace App\Supports;

use App\Repositories\RoleRepository;

class RoleService {

    private $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    public function roleRepository()
    {
        return $this->role;
    }

    public function pluck($field) {
        return $this->roleRepository()
                    ->makeModel()
                    ->pluck($field, 'id');
    }
}
