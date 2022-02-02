<?php

namespace App\Tests\Exercice4;

use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * @author Benjamin Manguet <benjamin.manguet@negocian.fr>
 */
class ProductTypeTest extends TypeTestCase
{
    public const UNAUTORIZED_FIELDS = ['creationDate', 'dateUpdate'];
    public const AUTORIZED_FIELDS   = ['name', 'priceHt'];

    /**
     * @return void
     */
    public function testFields(): void
    {
        $product = new Product();

        $view = $this->factory->create(ProductType::class, $product)
            ->createView();

        foreach ($view->children as $name => $child) {

            if (in_array($name, self::UNAUTORIZED_FIELDS, true)) {
                $this->fail('Le champs ' . $name . ' n\'est pas dans les champs autorisé');
            }
        }

        foreach (self::AUTORIZED_FIELDS as $AUTORIZED_FIELD) {

            if (!isset($view->children[$AUTORIZED_FIELD])) {
                $this->fail('Le champs ' . $AUTORIZED_FIELD . ' n\'existe pas');
            }
        }

        $this->assertTrue(true);
    }
}