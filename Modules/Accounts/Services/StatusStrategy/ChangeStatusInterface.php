<?php
namespace Modules\Accounts\Services\Account\StatusStrategy;
use Modules\Accounts\Entities\Account;


interface ChangeStatusInterface
{
public function freeze($account, $request): array;
public function activate($account): array;
public function closed($account, $request): array;
public function suspend($account, $request): array;

}
