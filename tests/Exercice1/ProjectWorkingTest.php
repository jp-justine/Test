<?php

namespace App\Tests\Exercice1;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class ProjectWorkingTest extends WebTestCase
{
    /**
     * @return void
     */
    public function testIndex(): void
    {
        self::ensureKernelShutdown();
        $client = self::createClient();
        $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}