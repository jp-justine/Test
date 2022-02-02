<?php

namespace App\Tests\Exercice3;

use App\Controller\ProductController;
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
        $client->request('GET', '/product');

        $this->assertTrue($client->getResponse()->isSuccessful(), 'La route /product ne fonctionne pas');
    }

    /**
     * @return void
     */
    public function testRequest(): void
    {
        $this->testFileCreated();

        $productController = new ReflectionClass(ProductController::class);

        $indexMethod = $this->testIndexMethodCreated($productController);
        $this->testPublic($indexMethod);

        $productControllerContent = file_get_contents(__DIR__ . '/../../src/Controller/ProductController.php');

        $this->testProductsIsSend($productControllerContent);
        $this->testRequestExist($productControllerContent);

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
    private function testIndexMethodCreated(ReflectionClass $productController): ReflectionMethod
    {
        try {
            $indexMethod = $productController->getMethod('index');
        } catch (Exception $exception) {
            $this->fail('Il n\'a pas de méthode nommée "index" dans le ProductController');
        }

        return $indexMethod;
    }

    /**
     * @param ReflectionMethod $indexMethod
     *
     * @return void
     */
    private function testPublic(ReflectionMethod $indexMethod): void
    {
        if ($indexMethod->getModifiers() !== 1) {
            $this->fail('Les méthodes des controllers doivent être public.');
        }
    }

    /**
     * @param string $productControllerContent
     *
     * @return void
     */
    private function testProductsIsSend(string $productControllerContent): void
    {
        if (!is_int(strpos($productControllerContent, 'products'))
            && strpos($productControllerContent, 'products') !== 0)
        {
            $this->fail('Il n\'y a pas de \'products\' (simples quotes) retournés vers le front');
        }
    }

    /**
     * @param string $productControllerContent
     *
     * @return void
     */
    private function testRequestExist(string $productControllerContent): void
    {
        $contentExploded = explode('\'products\'', $productControllerContent);
        $contentExploded = str_replace(
            ['\'', '"', '=', '>', ']', ')', ';', '}'],
            '',
            (end($contentExploded))
        );
        $contentExploded = trim(preg_replace('/\s\s+/', ' ', $contentExploded));

        if (count(explode($contentExploded, $productControllerContent)) < 2) {
            $this->fail('Il semblerai qu\'il manque qu\'il manque une requête repository');
        }
    }
}