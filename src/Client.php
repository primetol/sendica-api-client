<?php

namespace SendicaApi;

final class Client
{
    const API_VERSION = '0.0.1';
    const API_BASE_PATH = 'https://sendica.bg/api';

    private static $config;

    public function __construct(array $config = [])
    {
        self::$config = array_merge([
            'base_path' => self::API_BASE_PATH,
            'api_key'   => '',
        ], $config);
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
        $url = rtrim(self::$config['base_path'], '/') . '/' . ltrim($url, '/');
        $ch = curl_init();

        $headers = [
            'authorization: bearer ' . self::$config['api_key'],
            'user-agent: Sendica API Client v.' . self::API_VERSION,
            'content-type: application/json',
        ];

        $opts = [
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPAUTH       => CURLAUTH_ANY,
        ];

        switch ($method) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, 1);

                if ($data) {
                    $opts[CURLOPT_POSTFIELDS] = json_encode($data);
                }

                break;

            case 'PATCH':
                $opts[CURLOPT_CUSTOMREQUEST] = 'PATCH';

                if ($data) {
                    $opts[CURLOPT_POSTFIELDS] = json_encode($data);
                }

                break;

            default:
                if ($data) {
                    $url = $url . '?' . http_build_query($data);
                }
        }

        $opts[CURLOPT_URL] = $url;

        curl_setopt_array($ch, $opts);

        $result = json_decode(curl_exec($ch), true);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        curl_close($ch);

        if ($statusCode >= 400 && empty($result)) {
            return [
                'status'  => $statusCode,
                'type'    => 'error',
                'data'    => null,
                'message' => $error ?: 'empty_response',
            ];
        }

        return $result;
    }
}
