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


namespace OCA\Registration\Controller;

use \OCA\AppFramework\Controller\Controller;
use \OCA\AppFramework\Core\API;
use \OCA\AppFramework\Http\Request;


class PageController extends Controller {


	public function __construct(API $api, Request $request){
		parent::__construct($api, $request);
	}


	/**
	 * ATTENTION!!!
	 * The following comment turns off security checks
	 * Please look up their meaning in the documentation!
	 *
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 */
	public function index() {
		return $this->render('main');
	}
	
	/**
	 * @IsLoggedInExemption
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 * @CSRFExemption
	 */
	public function ryan() {
		
		$parameters = array();
		//foreach( $errors as $key => $value ) {
		//	$parameters[$value] = true;
		//}
		
		if (!empty($_POST['user'])) {
			$parameters["username"] = $_POST['user'];
			$parameters['user_autofocus'] = false;
		} else {
			$parameters["username"] = '';
			$parameters['user_autofocus'] = true;
		}
		if (isset($_REQUEST['redirect_url'])) {
			$redirect_url = $_REQUEST['redirect_url'];
			$parameters['redirect_url'] = urlencode($redirect_url);
		}

		//$parameters['alt_login'] = OC_App::getAlternativeLogIns();
		\OC_Template::printGuestPage("registration", "form", $parameters);
	}
}