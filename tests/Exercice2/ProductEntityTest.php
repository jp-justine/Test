<?php

namespace App\Tests\Exercice2;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionProperty;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class ProductEntityTest extends TestCase
{
    public const PROPERTIES = [
        'id'           => [
            'type' => 'integer'
        ],
        'name'         => [
            'type'   => 'string',
            'length' => '255'
        ],
        'priceHt'      => [
            'type'   => 'float'
        ],
        'creationDate' => [
            'type'  => 'datetime'
        ],
        'dateUpdate'   => [
            'type'     => 'datetime',
            'nullable' => 'nullable=true',
        ],
    ];

    /**
     * @return void
     */
    public function testProductEntity(): void
    {
        if (!class_exists(Product::class)) {
            $this->fail('L\'entité Product n\'existe pas ou n\'est pas dans le namespace App\EntityProduct');
        }

        $productClass = new ReflectionClass(Product::class);

        foreach ($productClass->getProperties() as $property) {

            $this->testId($property);
            $this->testPrivates($property);
            $this->testPropertyType($property);
            $this->testLength($property);
            $this->testNullable($property);
        }

        if (!file_exists(__DIR__ . '/../../src/Repository/ProductRepository.php')) {
            $this->fail('L\'entité Product n\'a pas de repository dans src/Repository');
        }

        $this->assertTrue(true);
    }

    /**
     * @param ReflectionProperty $property
     *
     * @return void
     */
    private function testId(ReflectionProperty $property): void
    {
        if ($property->getName() === 'id'
            && 0 === strpos($property->getDocComment(), 'GeneratedValue'))
        {
            $this->fail('Un id doit être nommé en GeneratedValue');
        }
    }

    /**
     * @param ReflectionProperty $property
     *
     * @return void
     */
    private function testPrivates(ReflectionProperty $property): void
    {
        if ($property->getModifiers() !== 4) {
            $this->fail('Merci de respecter le principe d\'encapsulation pour la propriété ' . $property->getName());
        }
    }

    /**
     * @param ReflectionProperty $property
     *
     * @return void
     */
    private function testPropertyType(ReflectionProperty $property): void
    {
        if (!is_int(strpos($property->getDocComment(), self::PROPERTIES[$property->getName()]['type']))
            && strpos($property->getDocComment(), self::PROPERTIES[$property->getName()]['type']) !== 0)
        {
            $this->fail('La propriété ' . $property->getName() . ' n\'est pas en ' . self::PROPERTIES[$property->getName()]['type']);
        }
    }

    /**
     * @param ReflectionProperty $property
     *
     * @return void
     */
    private function testLength(ReflectionProperty $property): void
    {
        if (isset(self::PROPERTIES[$property->getName()]['length'])
            && !is_int(strpos($property->getDocComment(), self::PROPERTIES[$property->getName()]['length']))
            && strpos($property->getDocComment(), self::PROPERTIES[$property->getName()]['length']) !== 0
        )
        {
            $this->fail('La propriété ' . $property->getName() . ' n\'a pas la longueur de : ' . self::PROPERTIES[$property->getName()]['length']);
        }
    }

    /**
     * @param ReflectionProperty $property
     *
     * @return void
     */
    private function testNullable(ReflectionProperty $property): void
    {
        if (isset(self::PROPERTIES[$property->getName()]['nullable'])) {

            if (!is_int(strpos($property->getDocComment(), self::PROPERTIES[$property->getName()]['nullable']))
                && strpos($property->getDocComment(), self::PROPERTIES[$property->getName()]['nullable']) !== 0 )
            {
                $this->fail('La propriété ' . $property->getName() . ' n\'est pas nullable');
            }

        } elseif (is_int(strpos($property->getDocComment(), 'nullable'))
            && strpos($property->getDocComment(), 'nullable') !== 0 )
        {
            $this->fail('La propriété ' . $property->getName() . ' ne doit pas contenir d\'information pour la nullabilité car par défault, doctrine la qualifie en nullable false');
        }
    }
}