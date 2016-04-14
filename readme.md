## Laravel's Eloquent ORM Bootstrapped for Concrete 5.7

This simple package is used to add the ability to create Eloquent Model's within Concrete5. This is a developer package only, there is no fun UI at this time.

Requirements

- Concrete 5.7.4+
- PHP 5.5+
- Composer installed globally or latest composer.phar installed locally in the Concrete5 ROOT directory
- curl (if composer is not installed)
- depending on your server's permissions, some commands may need the 'sudo' command before each installation

For Concrete 5.6, please see this branch:
(repo coming soon)

Instructions

If composer is installed and working, skip to 'Install The Eloquent Package via Composer' Step

SSH into your server (if working remotely)
```
ssh user@remote-host.com
```

Change to your Concrete5 installation ROOT directory (optional depending on SSH home directory)
```
cd mywebsite.com/www/
```

Install Composer Globally (if not installed already!)
```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

Install Composer Globally (if not installed already!)
```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

Install The Eloquent Package via composer:
```
composer require afixia/eloquentc5 dev-master
```

Update 3rd party vendor information and install missing components:
```
cd packages/eloquent/libraries
composer update
```

Go to Concrete5 Dashboard and Install Package

Useage

Any new 5.7 package can automatically utilize and autoload your new eloquent models now if placed within the src/Models folder of your package. Example:
```
www/packages/my_package/src/Models/User.php
```

An example C5 User model then looks like this:
```
namespace Concrete\Package\MyPackage\Src\Models;
defined('C5_EXECUTE') or die("Access Denied.");

use Illuminate\Database\Eloquent\Model as EloquentModel;

class C5User Extends EloquentModel{

    protected $table = 'Users';
    protected $fillable = [];
    protected $primaryKey = 'uID';
    public $timestamps = false;

    public function getUserID()
    {
        return $this->uID;
    }

}
```
