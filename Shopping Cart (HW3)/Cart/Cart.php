<?php

namespace Cart;

class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties
    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        //TODO Implement method
        $prodAlreadyInCart = false;
        $cartItemRef = null;
        foreach ($this->items as $cartItem) {
            if ($cartItem->getProduct() === $product) {
                $cartItem->setQuantity($cartItem->getQuantity() + $quantity);
                $prodAlreadyInCart = true;
                $cartItemRef = $cartItem;
            }
        }
        if (!$prodAlreadyInCart) {
            $cartItemRef = new CartItem($product, $quantity);
            $this->items[] = $cartItemRef;
        }

        return $cartItemRef;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method
//        echo "before remove prod: \n";
//        print_r($this->items);

        $prodInCart = false;
        foreach ($this->items as $cartItem) {
            if ($cartItem->getProduct() === $product) {
                $prodInCart = true;
            }
        }
        if ($prodInCart) {
            $filteredItems = array_filter($this->items, function ($cartItem) use ($product) {
                return ($cartItem->getProduct() !== $product);
            });
            $this->items = $filteredItems;
        } else {
            echo "Product is not in cart!\n";
        }
//        echo "after remove prod: \n";
//        print_r($this->items);
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        //TODO Implement method
        $totalQuantity = 0;
//        echo "items: ";
//        print_r($this->items);
        echo "\n";
        foreach ($this->items as $item) {
            $totalQuantity += $item->getQuantity();
            echo "total quantity: " . $totalQuantity . "\n";
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        //TODO Implement method
        $totalSum = 0;
        foreach ($this->items as $item) {
            $totalSum  += ($item->getQuantity() * $item->getProduct()->getPrice());
        }
        return $totalSum;
    }
}