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
### Usage
The Project is divided into the Frontend and the Backend
Ajax folder - contains the mini-calculator class that calls the PolicyFactory
 create method to communicate to the PolicyController Class and returns the Formatted Output in JSON format

 controller folder - contains the PolicyController and the PolicyFactory Classes

 css - contains the bootstrap styles for Theming
 
 js - contains the Bootstrap JS files, and the script.js which post the value from the Modal box on index.php, and displays the formatted output in the DIV tag in the frontend