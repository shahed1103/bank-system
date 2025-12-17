<?php

namespace Modules\Accounts\Services\Collaborate;

use Modules\Accounts\Services\Account\AccountFactory;
use App\Services\UserService;

class RegisterAndAccountCreation {

    public function __construct(private UserService  $userService , private AccountFactory $accountFactory){
        $this->userService = $userService;
        $this->accountFactory = $accountFactory;
    }

    public function registerUserWithAccount($request): array{

        DB::beginTransaction();
        try{
        $data['user'] = $this->userService->register($request);

        $service = $this->accountFactory->make($request['account_type_id']);

        $data['account'] = $service->create($request);

        DB::commit();

        $message = 'User and account created successfully';

        return ['userAccounut' => $data , 'message' => $message];

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


}