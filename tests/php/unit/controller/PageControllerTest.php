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

use \OCA\AppFramework\Http\Request;
use \OCA\AppFramework\Http\TemplateResponse;
use \OCA\AppFramework\Utility\ControllerTestUtility;

use \OCA\Registration\DependencyInjection\DIContainer;


class PageControllerTest extends ControllerTestUtility {

	private $container;

	/**
	 * Gets run before each test
	 */
	public function setUp(){
		$this->container = new DIContainer();
		$this->container['Request'] = new Request();
		$this->container['API'] = $this->getMockBuilder(
			'\OCA\AppFramework\Core\API')
			->disableOriginalConstructor()
			->getMock();
	}


	public function testIndexAnnotations(){
		$annotations = array('IsAdminExemption', 'IsSubAdminExemption',
			'CSRFExemption');
		$this->assertAnnotations($this->container['PageController'], 'index', 
			$annotations);
	}


	public function testIndex(){
		$response = $this->container['PageController']->index();
		$this->assertEquals('main', $response->getTemplateName());
		$this->assertTrue($response instanceof TemplateResponse);
	}


}