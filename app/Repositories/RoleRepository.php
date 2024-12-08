<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function getAll()
    {
        return Role::all();
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function findById($id)
    {
        return Role::findOrFail($id);
    }
}