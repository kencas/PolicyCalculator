# PolicyCalculator
## The Design Pattern

The policy calculator was developed with a Factory Design Pattern, so the new Instance of the Policy Object is Instantiated in a Public Static method in PolicyFactory Class

```php
class PolicyFactory
{
    public static function create($carValue = 545789, $tax = 10, $installment = 5, $basePolicy = 11, $commission = 17)
    {
        return new PolicyController($carValue, $tax, $installment, $basePolicy, $commission);
    }
}

```