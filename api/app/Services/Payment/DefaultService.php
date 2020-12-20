<?php


namespace App\Services\Payment;


use GuzzleHttp\Client;
use Illuminate\Http\Response;

class DefaultService
{
    private $userName;
    private $password;
    private $token;
    public $rootUrl;
    public $returnUrl;
    public $failUrl;

    public function __construct()
    {
        $this->userName = config('services.payment.USERNAME');
        $this->password = config('services.payment.PASSWORD');
        $this->token = config('services.payment.TOKEN');
        $this->rootUrl = 'https://3dsec.sberbank.ru/payment/rest/';
        $this->returnUrl = config('services.payment.CALLBACK') . '?success=1';
        $this->failUrl = config('services.payment.CALLBACK') . '?success=0';
    }

    private function getUrl(string $suffix)
    {
        return $this->rootUrl.$suffix;
    }

    public function register($entity)
    {
        $url = $this->getUrl('register.do');
        $query = http_build_query([
            'userName' => $this->userName,
            'password' => $this->password,
            'orderNumber' => $entity->id,
            'amount' => (int) ($entity->price * 100),
            'returnUrl' => $this->returnUrl,
            'failUrl' => $this->failUrl,
            'email' => $entity->student->email,
        ]);
        $url .= "?{$query}";
        $client = new Client();
        $response = $client->post($url);
        $contents = $response->getBody()->getContents();
        return is_string($contents) ? json_decode($contents) : json_decode(json_encode($contents));
    }

    public function reverse(string $orderId)
    {
        $url = $this->getUrl('reverse.do');
        $query = http_build_query([
            'userName' => $this->userName,
            'password' => $this->password,
            'orderId' => $orderId,
        ]);
        $url .= "?{$query}";
        $client = new Client();
        $response = $client->post($url);
        $contents = $response->getBody()->getContents();
        return is_string($contents) ? json_decode($contents) : json_decode(json_encode($contents));
    }

    public function refund(string $orderId, int $amount)
    {
        $url = $this->getUrl('refund.do');
        $query = http_build_query([
            'orderId' => $orderId,
            'amount' => $amount,
        ]);
        $url .= "?{$query}";
        $client = new Client();
        $response = $client->post($url);
        $contents = $response->getBody()->getContents();
        return is_string($contents) ? json_decode($contents) : json_decode(json_encode($contents));
    }

    public function getOrderStatusExtended(string $orderId)
    {
        $url = $this->getUrl('getOrderStatusExtended.do');
        $query = http_build_query([
            'userName' => $this->userName,
            'password' => $this->password,
            'orderId' => $orderId,
        ]);
        $url .= "?{$query}";
        $client = new Client();
        $response = $client->post($url);
        $contents = $response->getBody()->getContents();
        return is_string($contents) ? json_decode($contents) : json_decode(json_encode($contents));
    }
}
