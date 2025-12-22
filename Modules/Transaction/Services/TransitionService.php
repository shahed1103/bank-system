<?php

namespace Modules\Transaction\Services;
use Modules\Accounts\Entities\Account;
use Exception;
use Modules\Transaction\Services\Strategy\TransitionStrategy;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\DB;
class TransitionService
{

public function __construct( private TransitionStrategy $transitionStrategy){
    $this->transitionStrategy = $transitionStrategy;
}


    public function withdraw($accountId , $request): array{
        DB::beginTransaction();
        try{
        $account = Account::find($accountId);
        $statusService = $this->transitionStrategy->withdrawStr($account->account_status_id);
        $resultData=[];
        $resultData = $statusService->withdraw( $account , $request);
        DB::commit();

        return  ['account'=>$resultData , 'message' => 'message'];

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

        public function deposit($accountId , $request): array{
        DB::beginTransaction();
        try{
        $account = Account::find($accountId);
        $statusService = $this->transitionStrategy->depositStr($account->account_status_id);
        $resultData=[];
        $resultData=$statusService->deposit( $account , $request);
        DB::commit();

         return  ['account'=>$resultData , 'message' => 'message'];

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function transfer($accountId , $request): array{
        DB::beginTransaction();
        try{
        $account = Account::find($accountId);
        $statusService = $this->transitionStrategy->transferStr($account->account_status_id);
        $resultData=[];
        $resultData=$statusService->transfer( $account , $request);
        DB::commit();

      return  ['account'=>$resultData , 'message' => 'message'];

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }

 public function getNonApprovedTransition(): array{
        $trans = Transition::where('approv' , false)->get();
        $message = 'your Transition get successfuly ';
        return ['trans' => $trans , 'message' => $message];
    }

 public function getNonApprovedTransfer(): array{
        $trans = Transfer::where('approv' , false)->get();
        $message = 'your Transfer get successfuly ';
        return ['trans' => $trans , 'message' => $message];
    }

 public function approveTransition( $tranId ): array{
        $tran = Transition::find($tranId)->get();
        $tran ->update([
       'approv' => true,
        ]);
        $tran-> save();
        $message = 'your Transition completed successfuly ';
        return ['tran' => $tran , 'message' => $message];
    }

 public function approveTransfer( $tranId ): array{
        $tran = Transfer::find($tranId)->get();
        $tran ->update([
       'approv' => true,
        ]);
        $tran-> save();
        $message = 'your Transfer completed successfuly ';
        return ['tran' => $tran , 'message' => $message];
    }

 public function getTransHistory( $accountID ): array{
        $transition = Transition::where('account_id', $accountID)->get();
        $send_transfer = Transfer:: where('send_account_id', $accountID)->get();
        $recive_transfer = Transfer:: where('recive_account_id', $accountID)->get();


        $message = 'your history retived successfuly ';
        return ['transition' => $transition , 'send_transfer' => $send_transfer
     , 'recive_transfer' => $recive_transfer , 'message' => $message];
    }



}
