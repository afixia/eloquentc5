<?php
namespace Concrete\Package\Eloquent;
defined('C5_EXECUTE') or die(_("Access Denied."));
require __DIR__ . DIRECTORY_SEPARATOR . 'libraries' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Concrete\Core\Package\Package;
use Concrete\Core\Support\Facade\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Controller extends Package
{

    protected $pkgHandle = 'eloquent';
    protected $appVersionRequired = '5.7.1';
    protected $pkgVersion = '1.2';

    public function getPackageDescription() {
        return t('Enables Laravel Eloquent ORM in Concrete5.7');
    }

    public function getPackageName() {
        return t('Eloquent ORM');
    }

    protected function bootEloquent()
    {
        $capsule = new Capsule();

        $db_info = array(
            'server' => '',
            'database' => '',
            'username' => '',
            'password' => '',
            'charset' => '',
        );

        $db_config = Config::get('database');

        if (is_array($db_config)){
            if (isset($db_config['connections']['concrete'])){
                $db_info = $db_config['connections']['concrete'];
            }
        }

        $capsule->addConnection(array(
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => $db_info['database'],
            'username' => $db_info['username'],
            'password' => $db_info['password'],
            'charset' => $db_info['charset'],
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        ));
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->bootEloquent();
    }

    public function on_start(){
        $this->bootEloquent();
    }


    public function install() {
        parent::install();
    }

    public function upgrade() {
        parent::upgrade();
    }
}
