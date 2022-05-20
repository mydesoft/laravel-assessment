<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Interface\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepository){
		$this->userRepository = $userRepository;
	}

	public function allUsers(): JsonResponse
	{
		$users = $this->userRepository->all();

		if (!$users) {
			return $this->apiSuccess('No Users Yet');
		}
		return $this->apiSuccess('Users Found', UserResource::collection($users));
	}

    public function filteredUsers(Request $request): JsonResponse
    {
		$filteredusers = $this->userRepository->filter($request);

		if ($filteredusers->isEmpty()) {
			return $this->apiNotFound('No Users found');
		}
    	return $this->apiSuccess('Users Found', $filteredusers);
    }
}
