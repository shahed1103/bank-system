<?php

namespace Modules\Transaction\Services;


class TransitionService
{

public function __construct( private TransitionStrategy $transitionStrategy){
    $this->transitionStrategy = $transitionStrategy;
}




}
