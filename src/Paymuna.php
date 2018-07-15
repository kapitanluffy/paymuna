<?php

namespace kapitanluffy\Paymuna;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class Paymuna
{
    protected $id;

    protected $secret;

    protected $http;

    protected $apiUrl = "https://paymuna.com";

    protected $endpoints = [
        'get_checkout_template' => "/rest/checkout/detail",
        'search_checkout_template' => "/rest/checkout/search",
        'get_transaction' => "/rest/transaction/detail",
        'create_transaction' => "/rest/transaction/create"
    ];

    public function __construct($id, $secret, ClientInterface $http = null)
    {
        $this->id = $id;
        $this->secret = $secret;
        $this->http = $http ?: new HttpClient();
    }

    public function createTransaction(Transaction $transaction, CheckoutTemplate $template)
    {
        $query = http_build_query(['client_id' => $this->id, 'client_secret' => $this->secret, 'checkout_reference' => $template->getReference()]);
        $endpoint = sprintf("%s%s?%s", $this->apiUrl, $this->endpoints['create_transaction'], $query);

        $params = [];

        $params['transaction_callback'] = $transaction->getCallbackUrl();
        $params['transaction_redirect'] = $transaction->getRedirectUrl();
        $params['transaction_address'] = [
            'billing' => $transaction->getBillingAddress()->toArray(),
            'shipping' => $transaction->getShippingAddress()->toArray()
        ];
        $params['transaction_items'] = $transaction->getItems();
        $params['transaction_shipping_methods'] = $transaction->getShippingMethods();
        $params['transaction_payment_methods'] = $transaction->getPaymentMethods();
        $params['transaction_variables'] = $transaction->getVariables();
        $params['transaction_extras'] = $transaction->getExtras();

        $request = new Request('POST', $endpoint, ['form_params' => $params]);
        $response = $this->sendRequest($request);

        return $response['results'];
    }

    public function getTransaction($reference)
    {
        $query = http_build_query(['client_id' => $this->id, 'client_secret' => $this->secret]);
        $endpoint = sprintf("%s%s/%s?%s", $this->apiUrl, $this->endpoints['get_transaction'], $reference, $query);

        $request = new Request('GET', $endpoint);
        $response = $this->sendRequest($request);

        return new Transaction($response['results']);
    }

    public function getCheckoutTemplate($reference)
    {
        $query = http_build_query(['client_id' => $this->id, 'client_secret' => $this->secret]);
        $endpoint = sprintf("%s%s/%s?%s", $this->apiUrl, $this->endpoints['get_checkout_template'], $reference, $query);

        $request = new Request('GET', $endpoint);
        $response = $this->sendRequest($request);

        return new CheckoutTemplate($response['results']);
    }

    public function searchCheckoutTemplate($filter, $order = null, $start = 0, $range = 50)
    {
        $query = http_build_query([
            'client_id' => $this->id,
            'client_secret' => $this->secret,
            'filter' => $filter,
            'order' => $order,
            'start' => $start,
            'range' => $range
        ]);

        $endpoint = sprintf("%s%s?%s", $this->apiUrl, $this->endpoints['search_checkout_template'], $query);

        $request = new Request('GET', $endpoint);
        $response = $this->sendRequest($request);

        $templates = [];

        foreach ($response['results']['rows'] as $tpl) {
            $templates[] = new CheckoutTemplate($tpl);
        }

        return $templates;
    }

    protected function sendRequest(RequestInterface $request)
    {
        $response = $this->http->send($request);

        $code = $response->getStatusCode();
        $body = $response->getBody();

        $body = json_decode($body, true);
        $json = $this->getJsonError();

        if ($json != null) {
            throw new \Exception("JSON Error [$json]");
        }

        if ($body['error'] == true) {
            throw new \Exception("Paymuna Error [{$body['message']}]");
        }

        if ($code > 299) {
            throw new BadResponseException("HTTP Error [$code]", $request, $response);
        }

        return $body;
    }

    protected function getJsonError()
    {
        $error = json_last_error();

        if ($error != JSON_ERROR_NONE) {
            return json_last_error_msg();
        }

        return null;
    }
}
