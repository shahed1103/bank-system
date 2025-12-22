<?php
namespace Modules\Accounts\Services\StatusStatePattern;


interface ChangeStatusInterface
{
public static function freeze($account, $request): array;
public static function activate($account): array;
public static function closed($account, $request): array;
public static function suspend($account, $request): array;

}
