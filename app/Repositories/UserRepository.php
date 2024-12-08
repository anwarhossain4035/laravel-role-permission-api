<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getAll()
    {
        return User::with(['roles', 'permissions'])->get();
    }

    public function create(array $data)
    {
        $user = User::create($data);
        if (isset($data['roles'])) {
            $user->assignRole($data['roles']);
        }
        if (isset($data['permissions'])) {
            $user->givePermissionTo($data['permissions']);
        }
        return $user;
    }

    public function findById($id)
    {
        return User::with(['roles', 'permissions'])->findOrFail($id);
    }
}
