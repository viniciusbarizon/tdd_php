<?php
namespace CDC\Store\Product;

use CDC\Store\Cart\ShoppingCart,
    CDC\Store\Product\Product,
    CDC\Store\Product\BiggerAndSmaller;
use PHPUnit_Framework_TestCase as PHPUnit;

class BiggerAndSmallerTest extends PHPUnit
{
    public function testOrderDesc ()
    {
        $cart = new ShoppingCart ();

        $cart->add( new Product( "Geladeira", 450.00 ) );
        $cart->add( new Product( "Liquidificador", 250.00 ) );
        $cart->add( new Product( "Jogo de Pratos", 70.00 ) );

        $biggerSmaller = new BiggerAndSmaller ();
        $biggerSmaller->find( $cart );

        $this->assertEquals( "Jogo de Pratos", $biggerSmaller->getSmaller ()->getName () );
        $this->assertEquals( "Geladeira", $biggerSmaller->getBigger () ->getName () );
    }
}