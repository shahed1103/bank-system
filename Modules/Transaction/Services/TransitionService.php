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
        $resultData=[];
        $resultData=$statusService->withdraw( $account , $request);
        DB::commit();

        return  $resultData;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

        public function deposit($accountId , $request): array{
        DB::beginTransaction();
        try{
        $account = Account::find($accountId);
        $statusService = $this->transitionStrategy->depositStr($account->$account_status_id);
        $resultData=[];
        $resultData=$statusService->deposit( $account , $request);
        DB::commit();

        return  $resultData;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

            public function transfer($accountId , $request): array{
        DB::beginTransaction();
        try{
        $account = Account::find($accountId);
        $statusService = $this->transitionStrategy->transferStr($account->$account_status_id);
        $resultData=[];
        $resultData=$statusService->transfer( $account , $request);
        DB::commit();

        return  $resultData;

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
