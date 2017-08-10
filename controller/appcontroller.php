<?php
/**
 * @copyright Copyright (c) 2017 Hagai Asaban <hagay.asaban@gmail.com>
 *
 * @author Hagai Asaban <hagay.asaban@gmail.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\AppOrder\Controller;

use \OCP\AppFramework\Controller;
use OCP\AppFramework\Http\RedirectResponse;
use \OCP\IRequest;
use \OCA\AppOrder\Service\ConfigService;
use OCA\AppOrder\Util;
use OCP\IURLGenerator;

class AppController extends Controller {

	private $urlGenerator;

	public function __construct($appName,
								IRequest $request,
								IURLGenerator $urlGenerator) {
		parent::__construct($appName, $request);
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @return RedirectResponse
	 */
	public function index() {
		$firstPage = null;
		$appId = 'rtl';

		if (getenv('front_controller_active') === 'true') {
			$firstPage = $this->urlGenerator->getAbsoluteURL('/apps/' . $appId . '/');
		} else {
			$firstPage = $this->urlGenerator->getAbsoluteURL('/index.php/apps/' . $appId . '/');
		}
		
		return new RedirectResponse($firstPage);
	}

}
