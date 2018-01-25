<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EfunctionControllerTest extends WebTestCase
{
    
    public function testCompleteScenario()
    {
         //Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/efunction/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /efunction/");
        $crawler = $client->click($crawler->selectLink('STWÓRZ NOWE')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Twórz')->form(array(
            'appbundle_efunction[funktion]'  => 'Test',
            'appbundle_efunction[fDesc]'  => 'Test2',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Edit')->form(array(
            'appbundle_efunction[funktion]'  => 'Test3',
            'appbundle_efunction[fDesc]'  => 'Test4',
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Test3"]')->count(), 'Missing element [value="Test3"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Test4/', $client->getResponse()->getContent());
    }

    
}
