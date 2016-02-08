<?php

namespace WK\KlarnaApiBundle\Tests\Factory;

use Klarna;
use KlarnaCountry;
use KlarnaCurrency;
use KlarnaLanguage;
use PHPUnit_Framework_TestCase;
use Wk\KlarnaApiBundle\Factory\ClientFactory;

// what a hack for travis
$GLOBALS['xmlrpcName'] = 'This is a Test';
$GLOBALS['xmlrpcVersion'] = '0.0';

/**
 * Class WkKlarnaApiClientFactoryTest
 */
class WkKlarnaApiClientFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * This function tests if the factory returns a correct Klarna Client
     */
    public function testGetClient()
    {
        $factory = new ClientFactory();

        $eid = 815;
        $secret = 'aSecret';
        $country = KlarnaCountry::DE;
        $language = KlarnaLanguage::DE;
        $currency = KlarnaCurrency::EUR;
        $mode = Klarna::BETA;

        $klarna = $factory->createClient($eid, $secret, $country, $language, $currency, $mode);

        $this->assertInstanceOf('Klarna', $klarna);

        $this->assertAttributeEquals($eid, '_eid', $klarna);
        $this->assertAttributeEquals($secret, '_secret', $klarna);
        $this->assertAttributeEquals($country, '_country', $klarna);
        $this->assertAttributeEquals($language, '_language', $klarna);
        $this->assertAttributeEquals($currency, '_currency', $klarna);
        $this->assertAttributeEquals($mode, 'mode', $klarna);
    }
}
