# WkKlarnaApiBundle

[![Build Status](https://travis-ci.org/asgoodasnu/klarnaapi-bundle.png?branch=master)](https://travis-ci.org/asgoodasnu/klarnaapi-bundle) [![Total Downloads](https://poser.pugx.org/asgoodasnu/klarnaapi-bundle/d/total.png)](https://packagist.org/packages/asgoodasnu/klarnaapi-bundle) [![Latest Stable Version](https://poser.pugx.org/asgoodasnu/klarnaapi-bundle/v/stable.png)](https://packagist.org/packages/asgoodasnu/klarnaapi-bundle)

The WkKlarnaApiBundle wraps the Klarna PHPXML Api as a Symfony Bundle 

Installation
----------------------------------------------------------------

Require the bundle and its dependencies with composer:

    $ composer require asgoodasnu/klarnaapi-bundle
    
Register the bundle:

```php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        new Wk\KlarnaApiBundle\WkKlarnaApiBundle(),
    );
}
```

Configure your Klarna Settings in your `parameters.yml`:

```yaml
# parameters.yml
wk_klarna_api.merchant_id: 1234567 #My Merchant ID
wk_klarna_api.secret: mySecret #My Secret
wk_klarna_api.country: 81 # valid Country Codes are documented here: https://developers.klarna.com/sdk-references/xmlrpc_php/class-KlarnaCountry.html
wk_klarna_api.language: 28 # valid Languages are documented here: https://developers.klarna.com/sdk-references/xmlrpc_php/class-KlarnaLanguage.html
wk_klarna_api.currency: 2 # valid Currencies are documented here: https://developers.klarna.com/sdk-references/xmlrpc_php/class-KlarnaCurrency.html 
wk_klarna_api.mode: 0 # 0 for LIVE 1 for BETA
```
 
Usage
----------------------------------------------------------------
You can get a configured Klarna Object from the container:
```PHP
$klarna = $this->get('wk_klarna_api')
```

Read the Klarna-Documentation, what can be achieved with this object.

Dependencies
----------------------------------------------------------------
* `symfony/framework-bundle` - Symfony FrameworkBundle
* `klarna/php-xmlrpc:4.0` - Klarna XML API

PHPUnit Tests
----------------------------------------------------------------
You can run the tests using the following command:

    $ vendor/bin/phpunit

Resources
----------------------------------------------------------------
Symfony 2
> [http://symfony.com](http://symfony.com)

Klarna RPC API
> [https://developers.klarna.com/sdk-references/xmlrpc_php/package-KlarnaAPI.html](https://developers.klarna.com/sdk-references/xmlrpc_php/package-KlarnaAPI.html)

