<?php

namespace Modules\Transaction\Services\Strategy;

interface TransitionInterface {

public function withdraw(int $accountId , array $request , ?Transition $transition = null): array;
public function deposit(int $accountId , array $request): array;     //ايداع
public function transfer(int $accountId , array $request , ?Transfer $transfer = null): array;     //تحويل

}
