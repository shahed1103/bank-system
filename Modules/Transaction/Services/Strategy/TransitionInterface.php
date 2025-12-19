<?php

namespace Modules\Transaction\Services\Strategy;

interface TransitionInterface {

    public function withdraw($accountId , $request): array;    //سحب
    public function deposit($accountId , $request): array;     //ايداع
    public function transfer($accountId , $request): array;     //تحويل

}
