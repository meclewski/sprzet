<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

 class ApplicationAvailabilityFunctionalTest extends WebTestCase
 {
     /**
      * @dataProvider urlProvider
      */
     public function testPageIsSuccessful($url)
     {
         $client = self::createClient();
         $client->request('GET', $url);

         $this->assertTrue($client->getResponse()->isSuccessful());
     }

     public function urlProvider()
     {
         return array(
             array('/'),
             array('/equipment/'),
             array('/equipment/new'),
             array('/etype/'),
             array('/etype/new'),
             array('/producer/'),
             array('/producer/new'),
             array('/laboratory/'),
             array('/laboratory/new'),
             array('/verification/'),
             array('/verification/new'),
             array('/efunction/'),
             array('/efunction/new'),
         );
     }
 }