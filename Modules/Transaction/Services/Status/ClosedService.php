<?php

namespace Modules\Transaction\Services\Status;

use Modules\Transaction\Services\Strategy\TransitionInterface;

class ClosedService  implements TransitionInterface
{


public function withdraw($account , $request):array {
$message = "you cant withdraw because this account was closed because {$account->status_resion}";
return [ 'message' => $message];
}

public function deposit($account , $request):array {
$message = "you cant withdraw because this account was closed because {$account->status_resion}";
return [ 'message' => $message];
}

public function transfer($account , $request):array {
$message = "you cant withdraw because this account was closed because {$account->status_resion}";
return [ 'message' => $message];
}


}
