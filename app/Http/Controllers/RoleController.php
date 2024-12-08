<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepo;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        return response()->json($this->roleRepo->getAll());
    }

    public function store(Request $request)
    {
        $role = $this->roleRepo->create($request->all());
        return response()->json($role, 201);
    }
}
