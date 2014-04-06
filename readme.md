phileRedirect
=============

A [Phile](https://github.com/PhileCMS/Phile) plugin to return 300 (Multiple 
Choices), 301 (Permanent), and 307 (Temporary) redirects.

## Installation

Clone this repository into the Phile ```plugins/``` directory to end up with ```plugins/phileRedirect```

Enable the plugin in your ```config.php``` file:

```php
$config['plugins']['phileRedirect'] = array('active' => true);
```

## Examples

Edit the plugins config file ```plugins/phileRedirect/config.php```

```php
// Permanent redirects
'301' => array(
	'/'          => '/another/page',
	'/some/page' => 'http://www.google.com/',
),

// Temporary redirects
'307' => array(
	'/'       => '/maintenance',
	'/mypage' => '/temporarily-unavailable',
),
```
