<?php

namespace App\Tests\Exercice4;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Benjamin Manguet <benjamin.manguet@gmail.com>
 */
class ProductTypeFonctionalTest extends WebTestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * @return void
     */
    public function testSubmitForm(): void
    {
        $client = static::createClient();
        $client->request('GET', '/product/new');

        $this->testForm($client);
        $this->testCreationDate();
        $this->testRedirection($client);

        $this->assertTrue(true);
    }

    /**
     * @param KernelBrowser $client
     *
     * @return void
     */
    private function testForm(KernelBrowser $client): void
    {
        $products = $this->entityManager->getRepository(Product::class)
            ->findAll();

        $firstResult = count($products);

        $crawler     = $client->submitForm('Ajouter', [
            'product[name]'    => 'test-correction',
            'product[priceHt]' => 10.5,
        ]);

        try {
            $crawler->selectButton('Ajouter');
        } catch (Exception $exception) {
            $this->fail('Le label du bouton n\'est pas : Ajouter');
        }

        $afterProducts = $this->entityManager->getRepository(Product::class)
            ->findAll();

        $lastResult = count($afterProducts);

        if ($lastResult !== ($firstResult + 1)) {
            $this->fail('Le formulaire n\'ajoute pas d\'entrée en base de donnée');
        }
    }

    /**
     * @return void
     */
    private function testCreationDate(): void
    {
        $lastProduct = $this->entityManager->getRepository(Product::class)
            ->findOneBy([], ['id'=>'DESC']);

        if (null === $lastProduct->getCreationDate()) {
            $this->fail('Le champs creationDate n\'a pas été rempli');
        }
    }

    /**
     * @param KernelBrowser $client
     *
     * @return void
     */
    private function testRedirection(KernelBrowser $client): void
    {
        if ($client->getResponse()->getStatusCode() !== 302) {
            $this->fail('La soumission du formulaire ne fait pas de redirection');
        }

        $client->followRedirect();

        if ($client->getResponse()->getStatusCode() !== 200) {
            $this->fail('Votre soumission de formulaire effectue trop de redirections');
        }

        if ($client->getRequest()->getPathInfo() !== '/product') {
            $this->fail('La redirection ne va pas vers /product');
        }
    }
}