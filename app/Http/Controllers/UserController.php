<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;


class UserController extends Controller
{

    /**
     *
     */
    protected $service;

    /**
     *
     */
    protected $repository;

    /**
     *
     */
    public function __construct(UserService $service, UserRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     *
     */
    public function index(Request $request)
    {
        $users = $this->repository->doQuery(
            null,
            $request->take ?? 15,
            true,
            $request->sort ?? 'id',
            $request->descending ?? false
        );

        return view('users.index', ['users' => $users]);
    }

    /**
     *
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     *
     */
    public function store(CreateUserRequest $request)
    {
        $this->service->create($request->all());
        return redirect('/users')->with('status', 'Usuário cadastrado com sucesso!');
    }

    /**
     *
     */
    public function destroy($id)
    {
        $users = $this->repository->findByID($id);
        $users->delete();
        return redirect('/users')->with('status', 'Usuário removido com sucesso!');
    }
}
