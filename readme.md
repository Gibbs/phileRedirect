phileRedirect
=============

A [Phile](https://github.com/PhileCMS/Phile) plugin to return 300 (Multiple 
Choices), 301 (Permanent), and 307 (Temporary) redirects.

## Installation

1. Clone this repository into the Phile ```plugins/``` directory to end up with
```plugins/phileRedirect```
2. Add ```$config['plugins']['phileRedirect'] = array('active' => true);``` to 
your ```config.php``` file.

## Examples

Edit the plugins config file ```plugins/phileRedirect/config.php```

```
<?php
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
