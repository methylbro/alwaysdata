<?php

namespace Methylbro\Alwaysdata;

use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;

use Methylbro\Alwaysdata\Model\SiteManager;
use Methylbro\Alwaysdata\Transformer\SiteTransformer;

use Methylbro\Alwaysdata\Model\AccountManager;
use Methylbro\Alwaysdata\Transformer\AccountTransformer;

use Methylbro\Alwaysdata\Model\ProductManager;
use Methylbro\Alwaysdata\Transformer\ProductTransformer;

use Methylbro\Alwaysdata\Model\LocationManager;
use Methylbro\Alwaysdata\Transformer\LocationTransformer;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    protected function getClient()
    {
        return new Client(getenv('api_login'), getenv('api_password'));
    }

    public function testSite()
    {
        $site_manager = new SiteManager(
            $this->getClient(),
            new SiteTransformer()
        );

        /*
        $site = $site_manager
            ->create()
            ->setName('my website')
            ->setPath('/www/')
            ->addAddress('my-website.com')
            ->addAddress('www.my-website.com')
        ;
        $site_manager->update($site);
        */

        /*
        $sites = $site_manager->findAll();
        var_dump($sites);exit;
        */

        $site = $site_manager->findByHref('/v1/site/404703/');
    }

    public function testAccount()
    {
        $client = $this->getClient();

        $product_manager = new ProductManager(
            $client,
            new ProductTransformer()
        );
        $location_manager = new LocationManager(
            $client,
            new LocationTransformer()
        );
        $account_manager = new AccountManager(
            $client,
            new AccountTransformer($product_manager, $location_manager)
        );

        $accounts = $account_manager->findAll();

        //var_dump($accounts[0]);
    }

    public function testError()
    {
        $client = $this->getClient();

        $mock = new Mock([
            new Response(404, [])
        ]);

        $client->getHttpClient()->getEmitter()->attach($mock);

        $site_manager = new SiteManager(
            $client,
            new SiteTransformer()
        );

        $this->setExpectedException('\GuzzleHttp\Exception\ClientException');

        $site = $site_manager->findByHref('/v1/site/00000/');
    }

    public function testGetSite()
    {
        $client = $this->getClient();

        $site_transformer = new SiteTransformer();
        $site_manager = new SiteManager(
            $client,
            $site_transformer
        );
        $site = $site_manager
            ->create('/v1/site/1/', 1)
            ->setName('test')
        ;

        $mock = new Mock([
            new Response(200),
            "HTTP/1.1 200 OK\r\nContent-Length: 0\r\n\r\n".
            json_encode($site_transformer->objectToArray($site))
        ]);

        $client->getHttpClient()->getEmitter()->attach($mock);

        $site = $site_manager->findByHref('/v1/site/1/');

        $this->assertEquals('test', $site->getName());
    }

}
