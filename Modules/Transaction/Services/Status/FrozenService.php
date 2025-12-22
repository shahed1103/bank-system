<?php

namespace Modules\Transaction\Services\Status;

use Modules\Transaction\Services\Strategy\TransitionInterface;
use Modules\Transaction\Services\ChainOfResponsibility\AutoApproved;

class FrozenService  implements TransitionInterface
{
public function withdraw($account , $request):array {
$message = "you cant withdraw because this account was Frozen because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}

public function deposit($account , $request): array {
return AutoApproved::handelDeposit ($account , $request);

    }

public function transfer($account , $request):array {
$message = "you cant withdraw because this account was Frozen because {$account->status_resion} /
 waiting for return Active";
return [ 'message' => $message];
}



}
