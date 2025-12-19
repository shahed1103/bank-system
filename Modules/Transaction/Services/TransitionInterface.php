<?php

namespace Modules\Transaction\Services;

interface TransitionInterface {

    public function withdraw(): array;    //سحب
    public function deposit(): array;     //ايداع
    public function transfer(): array;     //تحويل
    public function freeze(): array;
    public function activate(): array;
    public function closed(): array;
    public function suspend(): array;





    // public function update(array $data): array;
}
