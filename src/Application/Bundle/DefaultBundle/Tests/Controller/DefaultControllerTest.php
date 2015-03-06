<?php

namespace Application\Bundle\DefaultBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

/**
 * Test cases for DefaultContoller
 *
 * @author Stepan Tanasiychuk <ceo@stfalcon.com>
 */
class DefaultControllerTest extends WebTestCase
{

    public function testHomePage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        // check responce
        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertCount(1, $crawler->filter('h1:contains("Решаем сложные задачи")'));

        $this->assertCount(1, $crawler->filter('h2:contains("Участвуем в Open Source")'));
        $this->assertCount(1, $crawler->filter('h2:contains("проводим конференции")'));
        $this->assertCount(1, $crawler->filter('h2:contains("ведем блог")'));
        $this->assertCount(1, $crawler->filter('form.subscribe-form'));

        $this->assertCount(1, $crawler->filter('.footer .contact-list a:contains("+380 67 334-40-40")'));
        $this->assertCount(1, $crawler->filter('.footer .contact-list a:contains("ул. Заречанская 3/2, Хмельницкий, Украина")'));
    }

    public function testContactPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', $this->getUrl('contacts', array()));

        // check responce
        $this->assertTrue($client->getResponse()->isSuccessful());
        // check phone number
        $this->assertCount(1, $crawler->filter('section.contacts-wrapper .info-group a:contains("+380 67 334-40-40")'));
        // check e-mail
        $this->assertCount(1, $crawler->filter('section.contacts-wrapper .info-group a:contains("info@stfalcon.com")'));
    }

}