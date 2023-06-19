<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\PhoneRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService extends AbstractService
{
    /**
     * 
     */
    protected $userRepository;

    /**
     *
     */
    protected $phoneRepository;

    /**
     *
     */
    public function __construct(
        UserRepository $userRepository,
        PhoneRepository $phoneRepository
    ) {
        $this->userRepository = $userRepository;
        $this->phoneRepository =  $phoneRepository;
    }

    /**
     *
     */
    public function create(array $data)
    {
        DB::transaction(function () use ($data) {

            $data['password'] = Hash::make($data['password']);
            $user = $this->userRepository->create($data);

            foreach ($data['numbers'] as $number)
                $this->phoneRepository->create([
                    'number' => $number,
                    'user_id' => $user->id
                ]);
        });
    }
}
