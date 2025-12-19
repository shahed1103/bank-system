<?php

namespace Modules\Transaction\Services\ChainOfResponsibility;

class AutoApproved  implements TransitionHandlerInterface
{

private ManagerApproved $managerApproved;
private const CONFERENCE_LIMIT = 10000000;


public function handelWithdraw($account , $request) : array{

    if ($request['amount'] >  $this->$conference){
$managerApproved->handelWithdraw($account , $request);
    }

$transition = Transition::create([
       'account_id' => $account->id,
        'type' => 'withdraw' ,
        'amount' => $request['amount'],
        'approv'=> 'true'

 ]);

$type = AccountType::findOrFail($account->account_type_id)->name;
    return match($type) {
            'savings' => SavingsAccountService::withdraw($account , $request , $transition),
            'checking' => CheckingAccountService::withdraw($account , $request, $transition),
            'loan' =>  LoanAccountService::withdraw($account , $request, $transition),
            'investment' =>  InvestmentAccountService::withdraw($account , $request, $transition),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }










public function handelDeposit($account , $request): array{
    if ($request['amount'] >  $this->$conference){
$managerApproved->handelDeposit($account , $request);
    }

$transition = Transition::create([
    'account_id' => $account->id,
    'type' => 'withdraw' ,
    'amount' => $request['amount'],
    'approv'=> 'true'

]);

$type = AccountType::findOrFail($account->account_type_id)->name;
         match($type) {
            'savings' => SavingsAccountService::deposit($account , $request),
            'checking' => CheckingAccountService::deposit($account , $request),
            'loan' =>  LoanAccountService::deposit($account , $request),
            'investment' =>  InvestmentAccountService::deposit($account , $request),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }












public function handelTransfer($account , $request): array{
    if ($request['amount'] >  $this->$conference){
$managerApproved->handelTransfer($account , $request);
    }

$transfer = Trasfer::create([
       'send_account_id' => $account->id,
       'recive_account_id' => $request ['recive_account_id'],
        'amount' => $request['amount'],
        'approv'=> 'true'

 ]);

$type = AccountType::findOrFail($account->account_type_id)->name;
         match($type) {
            'savings' => SavingsAccountService::transfer($account , $request , $transfer),
            'checking' => CheckingAccountService::transfer($account , $request , $transfer),
            'loan' =>  LoanAccountService::transfer($account , $request , $transfer),
            'investment' =>  InvestmentAccountService::transfer($account , $request , $transfer),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }
}

