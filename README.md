# form_control

Gives you full control over the way the Contao core form fields are being rendered.
After installation you can choose a template in every form field and adjust it to your needs.
Every form control template starts with the prefix `form_control_`.

## Helper methods
To display the available variables in the template use the following method within your `form_control_*` template:

```php
<?php $this->dumpFormControlVars(); ?>
```

## Dependencies

This module requires __at least PHP 5.4!__