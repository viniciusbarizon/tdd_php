<?php
namespace CDC\Store\Cart;

use CDC\Store\Product\Product;
use ArrayObject;

class ShoppingCart
{
    private $products;

    public function __construct ()
    {
        $this->products = new ArrayObject ();
    }

    public function add( Product $product )
    {
        $this->products->append( $product );
        return $this;
    }

    public function getProducts ()
    {
        return $this->products ();
    }

    public function biggerValue ()
    {
        if( count( $this->getItens () === 0 ) )
            return 0;

        $biggerValue = $this->getProducts()[0]->getValue ();
        foreach( $this->getProducts () as $product )
        {
            if( $biggerValue < $product->getValue () )
                $biggerValue = $product->getValue ();
        }

        return $biggerValue;
    }
}
