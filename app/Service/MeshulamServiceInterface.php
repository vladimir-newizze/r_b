<?php

namespace App\Service;

interface MeshulamServiceInterface
{
    public function get($method, $params);

    public function post($method, $params);
}
