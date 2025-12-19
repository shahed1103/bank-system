<?php

namespace Modules\Transaction\Services\ChainOfResponsibility;

interface TransitionHandlerInterface {

    public function handelWithdraw($accountId , $request): array;    //سحب
    public function handelDeposit($accountId , $request): array;     //ايداع
    public function handelTransfer($accountId , $request): array;     //تحويل

}
