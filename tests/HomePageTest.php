<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class HomePageTest extends TestCase
{
    public function testHomePage()
    {
        $client = new HttpBrowser(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', 'http://tddproject/');

        $this->assertEquals(200, $client->getResponse()->getStatus());
        $this->assertContains('Welcome', $crawler->filter('h1'));
    }
}
