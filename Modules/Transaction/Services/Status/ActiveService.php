<?php

namespace Modules\Transaction\Services\Status;
use Modules\Transaction\Services\Strategy\TransitionInterface;
use Modules\Transaction\Services\ChainOfResponsibility\AutoApproved;


class ActiveService  implements TransitionInterface
{

public function withdraw($account , $request): array {
AutoApproved::handelWithdraw ($account , $request);
    }

public function deposit($account , $request): array {
AutoApproved::handelDeposit ($account , $request);
    }

public function transfer($account , $request) : array{
AutoApproved::handelTransfer ($account , $request);
    }



}


