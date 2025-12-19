<?php

namespace Modules\Transaction\Services;


class TransitionService
{

public function __construct( private TransitionStrategy $transitionStrategy){
    $this->transitionStrategy = $transitionStrategy;
}


    public function withdraw($accountId , $request): array{
        DB::beginTransaction();
        try{
        $account = Account::find($accountId);
        $statusService = $this->transitionStrategy->withdrawStr($account->$account_status_id);
        $typeService = $statusService->withdraw( $account->account_type_id);
        $typeService ->withdraw ();


        DB::commit();

        $message = 'User and account created successfully';

        return ['userAccounut' => $data , 'message' => $message];

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
