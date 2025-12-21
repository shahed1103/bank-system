<?php

namespace Modules\Transaction\Services\ChainOfResponsibility;

interface TransitionHandlerInterface {

    public static function handelWithdraw($accountId , $request): array;    //سحب
    public static  function handelDeposit($accountId , $request): array;     //ايداع
    public static function handelTransfer($accountId , $request): array;     //تحويل

}
