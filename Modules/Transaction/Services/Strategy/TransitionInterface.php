<?php

namespace Modules\Transaction\Services\Strategy;

interface TransitionInterface {

public function withdraw(int $accountId , array $request ): array;
public function deposit(int $accountId , array $request): array;     //ايداع
public function transfer(int $accountId , array $request): array;     //تحويل

}
