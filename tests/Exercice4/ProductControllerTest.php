<?php

namespace App\Tests\Exercice4;

use App\Controller\ProductController;
use App\Form\ProductType;
use Exception;
use ReflectionClass;
use ReflectionMethod;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class ProductControllerTest extends WebTestCase
{
    /**
     * @return void
     */
    public function testControllerExist(): void
    {
        if (!file_exists(__DIR__ . '/../../src/Controller/ProductController.php')) {
            $this->fail('Le controller ProductController n\'est pas présent dans src/Controller');
        }

        self::ensureKernelShutdown();
        $client = self::createClient();
        $client->request('GET', '/product/new');

        $this->assertTrue($client->getResponse()->isSuccessful(), 'La route /product/new ne fonctionne pas');
    }

    /**
     * @return void
     */
    public function testRequest(): void
    {
        $this->testFileCreated();

        $productController = new ReflectionClass(ProductController::class);

        $newMethod = $this->testNewMethodCreated($productController);
        $this->testPublic($newMethod);

        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    private function testFileCreated(): void
    {
        if (!file_exists(__DIR__ . '/../../src/Controller/ProductController.php')) {
            $this->fail('Le controller ProductController n\'est pas présent dans src/Controller');
        }
    }

    /**
     * @param ReflectionClass $productController
     *
     * @return ReflectionMethod
     */
    private function testNewMethodCreated(ReflectionClass $productController): ReflectionMethod
    {
        try {
            $newMethod = $productController->getMethod('new');
        } catch (Exception $exception) {
            $this->fail('Il n\'a pas de méthode nommée "new" dans le ProductController');
        }

        return $newMethod;
    }

    /**
     * @param ReflectionMethod $newMethod
     *
     * @return void
     */
    private function testPublic(ReflectionMethod $newMethod): void
    {
        if ($newMethod->getModifiers() !== 1) {
            $this->fail('Les méthodes des controllers doivent être public.');
        }
    }

    /**
     * @return void
     */
    public function testForm(): void
    {
        if (!file_exists(__DIR__ . '/../../src/Form/ProductType.php')) {
            $this->fail('Le formulaire ProductType n\'est pas présent dans src/Form');
        }

        $this->assertTrue(true);
    }
}