## Laravel's Eloquent ORM Bootstrapped for Concrete 5.7

This simple package is used to add the ability to create Eloquent Model's within Concrete5. This is a developer package only, there is no fun UI at this time.

Requirements

- Concrete 5.7.4+
- PHP 5.5+

For Concrete 5.6, please see this branch:
(repo coming soon)

Instructions

Download zip file from github and extract to your Concrete5 ROOT directory, your structure should look like this:
```
application
...
packages/eloquent
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
