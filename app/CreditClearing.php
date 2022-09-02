<?php

namespace App;

use App\Service\MeshulamServiceInterface;
use Illuminate\Http\Request;

class CreditClearing
{
    const DEFAULT_SUM = 1;

    public function __construct(MeshulamServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getPeleCardAuthorizeCreditCard(Request $request)
    {
        return $this->service->post('createPaymentProcess', ['sum' => self::DEFAULT_SUM]);
    }
}
