<?php 

namespace humhub\libs;

use Yii;

class SelfTest
{

public static function getResults()
{
    $checks = array();

    $title = 'PHP - Version - ' . PHP_VERSION;

    if (version_compare(PHP_VERSION, '5.6', '>=')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Minimum 5.6'
        );
    }

    $title = 'PHP - GD Extension';

    if (function_exists('gd_info')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Install GD Extension'
        );
    }

    $title = 'PHP - EXIF Extension';

    if (function_exists('exif_read_data')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Install EXIF Extension'
        );
    }

    $title = 'PHP - FileInfo Extension';

    if (extension_loaded('fileinfo')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Install FileInfo Extension'
        );
    }
    $title = 'PHP - Multibyte String Functions';

    if (function_exists('mb_substr')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Install PHP Multibyte Extension'
        );
    }
    $title = 'PHP - cURL Extension';

    if (function_exists('curl_version')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Install Curl Extension'
        );
    }
    $title = 'PHP - ZIP Extension';

    if (class_exists('ZipArchive')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Install PHP ZIP Extension'
        );
    }
    $title = 'LDAP Support';

    if (\humhub\modules\user\authclient\ZendLdapClient::isLdapAvailable()) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'WARNING',
            'hint' => 'Optional - Install PHP LDAP Extension and Zend LDAP Composer Package'
        );
    }
    $title = 'PHP - APC(u) Support';

    if (function_exists('apc_add') || function_exists('apcu_add')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'WARNING',
            'hint' => 'Optional - Install APCu Extension for APC Caching'
        );
    }
    $title = 'PHP - SQLite3 Support';

    if (class_exists('SQLite3')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'WARNING',
            'hint' => 'Optional - Install SQLite3 Extension for DB Caching'
        );
    }
    $title = 'PHP - PDO MySQL Extension';

    if (extension_loaded('pdo_mysql')) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Install PDO MySQL Extension'
        );
    }
    $title = 'Permissions - Runtime';

    $path = Yii::getAlias('@runtime');
    if (is_writeable($path)) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Make ' . $path . " writable for the webserver/php!"
        );
    }
    $title = 'Permissions - Assets';

    $path = Yii::getAlias('@webroot/assets');
    if (is_writeable($path)) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Make ' . $path . " writable for the webserver/php!"
        );
    }
    $title = 'Permissions - Uploads';

    $path = Yii::getAlias('@webroot/uploads');
    if (is_writeable($path)) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Make ' . $path . " writable for the webserver/php!"
        );
    }
    $title = 'Permissions - Module Directory';

    $path = Yii::getAlias(Yii::$app->params['moduleMarketplacePath']);
    if (is_writeable($path)) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Make ' . $path . " writable for the webserver/php!"
        );
    }
    $title = 'Permissions - Dynamic Config';

    $path = Yii::getAlias(Yii::$app->params['dynamicConfigFile']);
    if (!is_file($path)) {
        $path = dirname($path);
    }

    if (is_writeable($path)) {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'OK'
        );
    } else {
        $checks[] = array(
            'title' => Yii::t('base', $title),
            'state' => 'ERROR',
            'hint' => 'Make ' . $path . " writable for the webserver/php!"
        );
    }

    return $checks;
}

}`
