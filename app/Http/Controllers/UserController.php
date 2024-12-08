<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        return response()->json($this->userRepo->getAll());
    }

    public function store(Request $request)
    {
        $user = $this->userRepo->create($request->all());
        return response()->json($user, 201);
    }

     /**
     * Assign multiple permissions to a user.
     */
    public function assignPermissions(Request $request, User $user)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $user->givePermissionTo($request->permissions);

        return response()->json([
            'message' => 'Permissions assigned successfully.',
            'user' => $user->load('permissions'), // Load the permissions relationship
        ]);
    }

    /**
 * Get all permissions of a user.
 */
public function getPermissions(User $user)
{
    // Use the `permissions` relationship provided by Spatie
    $permissions = $user->permissions;

    return response()->json($permissions, 200);
}
}
