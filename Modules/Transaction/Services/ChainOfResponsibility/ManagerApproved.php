<?php

namespace Modules\Transaction\Services\ChainOfResponsibility;

class ManagerApproved  implements TransitionHandlerInterface
{

    public function handelWithdraw($account , $request): array{
     $message = "this withdraw need admin approv befer comleted please wait
      for recive notefication";
    return ['message' => $message];
}

    public function handelDeposit($account , $request): array{
     $message = "this withdraw need admin approv befer comleted please wait
      for recive notefication";
    return ['message' => $message];
}

    public function handelTransfer($account , $request): array{
     $message = "this withdraw need admin approv befer comleted please wait
      for recive notefication";
    return ['message' => $message];
}

    }


