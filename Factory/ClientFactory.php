<?php

namespace Wk\KlarnaApiBundle\Factory;


use Klarna;

class ClientFactory
{
    private $client;


    /**
     * Returns {@link Klarna} object
     *
     * @param int    $eid      Merchant ID/EID
     * @param string $secret   Secret key/Shared key
     * @param int    $country  {@link KlarnaCountry}
     * @param int    $language {@link KlarnaLanguage}
     * @param int    $currency {@link KlarnaCurrency}
     * @param int    $mode     {@link Klarna::LIVE} or {@link Klarna::BETA}
     *
     * @return Klarna
     */
    public function createClient($eid, $secret, $country, $language, $currency, $mode)
    {
        if (!$this->client) {
            $this->client = new Klarna();
            $this->client->config($eid, $secret, $country, $language, $currency, $mode);
        }

        return $this->client;

    }

}
