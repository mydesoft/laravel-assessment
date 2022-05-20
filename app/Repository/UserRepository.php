<?php
namespace App\Repository;

use App\Interface\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
       return User::orderBy('created_at', 'desc')->paginate(20);
    }

    public function filter($request){

        $users = User::query();

        if ($request->has('name')) {
            $users = $users->where('name', 'LIKE', "%{$request->name}%");
        }
        if ($request->has('status')) {
            $users = $users->where('status', $request->status);
        }
        if ($request->has('age')) {
            $users = $users->where('age', $request->age);
        }
        if ($request->has('location')) {
            $users = $users->where('location', $request->location);
        }
        if ($request->has('gender')) {
            $users = $users->where('gender', $request->gender);
        }

        $filteredUsers = $users->paginate(10);

        return $filteredUsers;
    }
    
}