<?php

// Giả sử chúng ta có một lớp Vận chuyển sẽ tính toán chi phí vận chuyển của một sản phẩm dựa trên trọng lượng và điểm đến của nó.
class Shipping
{
    public function calculateShippingCost($weightOfPackageKg, $destiny)
    {
        // Pre-condition:
        if ($weightOfPackageKg <= 0) {
            throw new \Exception('Package weight cannot be less than or equal to zero');
        }

        // We calculate the shipping cost by
        $shippingCost = rand(5, 15);

        // Post-condition
        if ($shippingCost <= 0) {
            throw new \Exception('Shipping price cannot be less than or equal to zero');
        }

        return $shippingCost;
    }
}

class WorldWideShipping extends Shipping
{
    public function calculateShippingCost($weightOfPackageKg, $destiny)
    {
        // Pre-condition
        if ($weightOfPackageKg <= 0) {
            throw new \Exception('Package weight cannot be less than or equal to zero');
        }

        // We strengthen the pre-conditions
        if (empty($destiny)) {
            throw new \Exception('Destiny cannot be empty');
        }

        // We calculate the shipping cost by
        $shippingCost = rand(5, 15);

        // By changing the post-conditions we allow there to be cases
        // in which the shipping is 0
        if ('Spain' === $destiny) {
            $shippingCost = 0;
        }

        return $shippingCost;
    }
}