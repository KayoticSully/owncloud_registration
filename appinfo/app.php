<?php

/**
 * ownCloud - Registration app
 *
 * @author Ryan Sullivan
 *
 * @copyright 2013 Ryan Sullivan <kayoticsully@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OCA\Registration;

use \OCA\AppFramework\Core\API;


// dont break owncloud when the appframework is not enabled
if(\OCP\App::isEnabled('appframework')){

    $api = new API('registration');

    // uncomment the next line to activate the admin interface
    //$api->registerAdmin('admin/settings');

    if( ! $api->isLoggedIn()) {
        $api->addScript('registration_link');
        $api->addStyle('form');
    } else if($api->isAdminUser($api->getUserId())) {
        $api->addNavigationEntry(array(
            
            // the string under which your app will be referenced in owncloud
            'id' => $api->getAppName('registration'),
            
            // sorting weight for the navigation. The higher the number, the higher
            // will it be listed in the navigation
            'order' => 10,
            
            // the route that will be shown on startup
            'href' => $api->linkToRoute('registration_index'),
            
            // the icon that will be shown in the navigation
            // this file needs to exist in img/example.png
            'icon' => $api->imagePath('icon.svg'),
            
            // the title of your application. This will be used in the
            // navigation or on the settings page of your app
            'name' => $api->getTrans()->t('Registration')
        
        ));
    }

} else {
    $msg = 'Can not enable the  app because the App Framework App is disabled';
    \OCP\Util::writeLog('registration', $msg, \OCP\Util::ERROR);
}