<?php

namespace Modules\Transaction\Services\ChainOfResponsibility;
use Modules\Transaction\Services\ChainOfResponsibility\TransitionHandlerInterface;
use Modules\Transaction\Services\ChainOfResponsibility\ManagerApproved;
use Modules\Transaction\Entities\Transition;
use Modules\Transaction\Entities\Transfer;
use Modules\Accounts\Entities\AccountType;
use Exception;
use Modules\Transaction\Services\Types\{
    SavingAccountService,
    CheckingService,
    LoanService,
    InvestmentService
};

class AutoApproved  implements TransitionHandlerInterface
{

private static ManagerApproved $managerApproved; // تحويلها إلى static
private const CONFERENCE_LIMIT = 10000000;

public static function handelWithdraw($account, $request): array {

    if ($request['amount'] > self::CONFERENCE_LIMIT) {

        self::$managerApproved->handelWithdraw($account, $request);
    }

    $transition = Transition::create([
        'account_id' => $account->id,
        'type' => 'withdraw',
        'amount' => $request['amount'],
        'approv' => true
    ]);

$type = AccountType::findOrFail($account->account_type_id)->name;
echo($type);
    return match($type) {

            'savings' => SavingAccountService::withdraw($account , $request , $transition),
            'checking' => CheckingService::withdraw($account , $request, $transition),
            'loan' =>  LoanService::withdraw($account , $request, $transition),
            'investment' =>  InvestmentService::withdraw($account , $request, $transition),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }

















public static function handelDeposit($account , $request): array{
  if ($request['amount'] > self::CONFERENCE_LIMIT) {

        self::$managerApproved->handelWithdraw($account, $request);
    }

$transition = Transition::create([
    'account_id' => $account->id,
    'type' => 'withdraw' ,
    'amount' => $request['amount'],
    'approv'=> true

]);

$type = AccountType::findOrFail($account->account_type_id)->name;
         match($type) {
            'savings' => SavingAccountService::deposit($account , $request),
            'checking' => CheckingService::deposit($account , $request),
            'loan' =>  LoanService::deposit($account , $request),
            'investment' =>  InvestmentService::deposit($account , $request),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }












public static function handelTransfer($account , $request): array{
   if ($request['amount'] > self::CONFERENCE_LIMIT) {

        self::$managerApproved->handelWithdraw($account, $request);
    }

$transfer = Transfer::create([
       'send_account_id' => $account->id,
       'recive_account_id' => $request ['recive_account_id'],
        'amount' => $request['amount'],
        'approv'=> true

 ]);

$type = AccountType::findOrFail($account->account_type_id)->name;
         match($type) {
            'savings' => SavingAccountService::transfer($account , $request , $transfer),
            'checking' => CheckingService::transfer($account , $request , $transfer),
            'loan' =>  LoanService::transfer($account , $request , $transfer),
            'investment' =>  InvestmentService::transfer($account , $request , $transfer),
            default => throw new Exception("Invalid account type: $type", 400),
        };
    }
}

