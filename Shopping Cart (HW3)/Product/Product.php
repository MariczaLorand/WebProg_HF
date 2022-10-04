<?php

namespace Product;

class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    // TODO Generate constructor with all properties of the class
    /**
     * @param int $id
     * @param string $title
     * @param float $price
     * @param int $availableQuantity
     */
    public function __construct(int $id, string $title, float $price, int $availableQuantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    // TODO Generate getters and setters of properties
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getAvailableQuantity(): int
    {
        return $this->availableQuantity;
    }

    /**
     * @param int $availableQuantity
     */
    public function setAvailableQuantity(int $availableQuantity): void
    {
        $this->availableQuantity = $availableQuantity;
    }


    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        //TODO Implement method
        $prodAlreadyInCart = false;
        $cartItems = $cart->getItems();
        $cartItemRef = null;
        foreach ($cartItems as $cartItem) {
            if ($cartItem->getProduct() === $this) {
                for ($i = 0; $i < $quantity; $i++) {
                    $cartItem->increaseQuantity();
                }
                $prodAlreadyInCart = true;
                $cartItemRef = $cartItem;
            }
        }
        if (!$prodAlreadyInCart) {
            $cartItemRef = $cart->addProduct($this,$quantity);
        }

        return $cartItemRef;
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        //TODO Implement method
    }
}