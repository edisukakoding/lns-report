<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * @param UserDataTable $userDataTable
     * @return mixed
     */
    public function index(UserDataTable $userDataTable): mixed
    {
        return $userDataTable->render('admin.users.index');
    }

    /**
     * @throws JsonException
     */
    public function update(int $id, UpdateUserRequest $request): string
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return Json::encode(['status' => false, 'message' => __('messages.not_found', ['model' => __('models/personals.singular')])]);
        }

        $user->role = $request->role;
        if($user->save()) {
            return Json::encode(['status' => true, 'message' => 'User berhasil di update']);
        }
        return Json::encode(['status' => false, 'message' => 'Kesalahan tidak diketahui']);
    }
}
