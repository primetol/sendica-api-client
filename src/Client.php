<?php

namespace SendicaApi;

use SendicaApi\Exception\NetworkException;
use SendicaApi\Exception\RequestException;

final class Client
{
    const API_VERSION = '0.0.1';

    const API_BASE_PATH = 'https://sendica.bg/api/';
    /** @var array */
    private static $config;

    private function __construct()
    { }

    public static function init(array $config = [])
    {
        self::$config = array_merge([
            'base_path' => self::API_BASE_PATH,
            'api_key'   => '',
        ], $config);

        return new self;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $data
     *
     * @return array
     */
    public function request($method, $url, $data)
    {
        $url = self::API_BASE_PATH . $url;
        $curlHandler = curl_init();

        switch ($method) {
            case 'POST':
                curl_setopt($curlHandler, CURLOPT_POST, 1);

                if ($data) {
                    curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $data);
                }

                break;

            case 'PUT':
                curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, 'PUT');
                if ($data) {
                    curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $data);
                }

                break;

            default:
                if ($data) {
                    $url = $url . '?' . http_build_query($data);
                }
        }
        // OPTIONS:
        curl_setopt($curlHandler, CURLOPT_URL, $url);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, [
            'authorization: bearer ' . self::$config['api_key'],
            'user-agent: Sendica API Client v.' . self::API_VERSION,
            'content-type: application/json',
        ]);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandler, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        /** @var array $result */
        $result = curl_exec($curlHandler);

        $errno = curl_errno($curlHandler);
        $errMess = curl_error($curlHandler);
        curl_close($curlHandler);

        switch ($errno) {
            case CURLE_OK:
                break;
            case CURLE_COULDNT_RESOLVE_PROXY:
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_COULDNT_CONNECT:
            case CURLE_OPERATION_TIMEOUTED:
            case CURLE_SSL_CONNECT_ERROR:
                throw new NetworkException($errMess, $errno);
            default:
                throw new RequestException($errMess, $errno);
        }

        return $result;
    }
}
