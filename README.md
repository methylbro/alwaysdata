Alwaysdata API Client
=====================

Alwaysdata API's PHP implementation.

https://api.alwaysdata.com/

### Connect to the api 

```php
use Methylbro\Alwaysdata\Client;

$alwaysdata = new Client($username, $password);
```

### Manage website from the library

```php
use Methylbro\Alwaysdata\Model\SiteManager;
use Methylbro\Alwaysdata\Transformer\SiteTransformer;

$site_manager = new SiteManager($alwaysdata, new SiteTransformer());

// add a website
$site = $site_manager
    ->create()
    ->setName('my website')
    ->setPath('/www/my-website.com/')
    ->addAddress('my-website.com')
    ->addAddress('www.my-website.com')
;

$site_manager->update($site);

// list existing websites from api
$sites = $site_manager->findAll();

foreach ($sites as $site) {
    printf("%s : %s\n", $site->getName(), $site->getAddresses()[0]);
}

// fetch specific website from api
$site = $site_manager->findById(00001);
```

### Reference

- Account
- Site