<?php

namespace Modules\Transaction\Services\Strategy;

interface TransitionInterface {

    public function withdraw(): array;    //سحب
    public function deposit(): array;     //ايداع
    public function transfer(): array;     //تحويل




    // public function update(array $data): array;
}
