<?php

// Tạo một interfacetệp.
interface CalculabeShippingCost
{
    public function calculateShippingCost($weightOfPackageKg, $destiny);
}

class WorldWideShipping implements CalculabeShippingCost
{
    public function calculateShippingCost($weightOfPackageKg, $destiny)
    {
        // Implementation of logic
    }
}