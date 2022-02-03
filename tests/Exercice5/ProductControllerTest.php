<?php

namespace App\Tests\Exercice5;

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
        $client->request('GET', '/product/edit/1');

        $this->assertTrue($client->getResponse()->isSuccessful(), 'La route /product/edit/1 ne fonctionne pas');
    }

    /**
     * @return void
     */
    public function testRequest(): void
    {
        $this->testFileCreated();

        $productController = new ReflectionClass(ProductController::class);

        $editMethod = $this->testEditMethodCreated($productController);
        $this->testPublic($editMethod);

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
    private function testEditMethodCreated(ReflectionClass $productController): ReflectionMethod
    {
        try {
            $editMethod = $productController->getMethod('edit');
        } catch (Exception $exception) {
            $this->fail('Il n\'a pas de méthode nommée "edit" dans le ProductController');
        }

        return $editMethod;
    }

    /**
     * @param ReflectionMethod $editMethod
     *
     * @return void
     */
    private function testPublic(ReflectionMethod $editMethod): void
    {
        if ($editMethod->getModifiers() !== 1) {
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