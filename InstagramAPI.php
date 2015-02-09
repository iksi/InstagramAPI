<?php

/**
 * Basic Instagram API access (without access_token)
 *
 * @author     Iksi <info@iksi.cc>
 * @copyright  (c) 2014-2015 Iksi
 * @license    MIT
 */

namespace Iksi;

class InstagramAPI
{
    protected $clientId;
    protected $clientSecret;

    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    protected function fetch($url, $header)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return ($responseCode === 200)
            ? json_decode($response)
            : false;
    }

    public function request($resource, $arguments = array())
    {
        $arguments['client_id'] =  $this->clientId;

        $url = 'https://api.instagram.com/v1/' . $resource . '?'
            . http_build_query($arguments);

        $header = array(
            'Content-Type: type=application/json'
        );

        return $this->fetch($url, $header);
    }
}