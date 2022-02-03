<?php

namespace App\Tests\Exercice2;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class EnvFileTest extends KernelTestCase
{
    public const envLocation = __DIR__ . '/../../.env';

    /**
     * @return void
     */
    public function testEnvFileModified(): void
    {
        if (!file_exists(self::envLocation)) {
            $this->fail('Le fichier .env ne semble pas présent, reportez vous à votre évaluateur');
        }

        $kernel = self::bootKernel();

        $entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->assertTrue(
            $entityManager->getConnection()->connect(),
            'La connection vers la Base de donnée n\'a pas pu aboutir'
        );
    }
}