<?php
namespace App\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository
{
    public function getAll()
    {
        return Permission::all();
    }

    public function create(array $data)
    {
        return Permission::create($data);
    }

    public function findById($id)
    {
        return Permission::findOrFail($id);
    }
}