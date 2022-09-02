<?php

namespace App\Service;

class MeshulamService implements MeshulamServiceInterface
{
    private $params;

    public function __construct()
    {
        $this->params = [
            'userId' => env('MESHULAM_API_USER_ID'),
            'pageCode' => env('MESHULAM_API_PAGE_CODE'),
            'description' => env('MESHULAM_API_DESCRIPTION'),
            'successUrl' => env('MESHULAM_API_SUCCESS_URL'),
            'cancelUrl' => env('MESHULAM_API_CANCEL_URL'),
        ];
    }

    public function get($method, $params)
    {
        return $this->curlGet($method, array_merge($this->params, $params));
    }

    public function post($method, $params)
    {
        return $this->curlPost($method, array_merge($this->params, $params));
    }

    private function curlGet($method, $params)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => env('MESHULAM_API_URL') . $method,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS => $params,
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);

        return $result;
    }

    private function curlPost($method, $params)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('MESHULAM_API_URL') . $method . '/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response, true);

        return $result;
    }

    private function setTransId($params)
    {
        $transactionId = ($params['processId'] . '-' . $params['processToken']);
    }
}
