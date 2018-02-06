<?php
/**
 *
 *
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 * @author Sergio Bertolin <sbertolin@solidgear.es>
 * @author Sergio Bertolín <sbertolin@solidgear.es>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Message\ResponseInterface;

require __DIR__ . '/../../vendor/autoload.php';

trait BasicStructure {

	use Auth;
	use Download;
	use Trashbin;

	/** @var string */
	private $currentUser = '';

	/** @var string */
	private $currentServer = '';

	/** @var string */
	private $baseUrl = '';

	/** @var int */
	private $apiVersion = 1;

	/** @var ResponseInterface */
	private $response = null;

	/** @var CookieJar */
	private $cookieJar;

	/** @var string */
	private $requestToken;

	protected $adminUser;
	protected $regularUser;
	protected $localBaseUrl;
	protected $remoteBaseUrl;

	public function __construct($baseUrl, $admin, $regular_user_password) {

		// Initialize your context here
		$this->baseUrl = $baseUrl;
		$this->adminUser = $admin;
		$this->regularUser = $regular_user_password;
		$this->localBaseUrl = $this->baseUrl;
		$this->remoteBaseUrl = $this->baseUrl;
		$this->currentServer = 'LOCAL';
		$this->cookieJar = new CookieJar();

		// in case of ci deployment we take the server url from the environment
		$testServerUrl = getenv('TEST_SERVER_URL');
		if ($testServerUrl !== false) {
			$this->baseUrl = $testServerUrl;
			$this->localBaseUrl = $testServerUrl;
		}

		// federated server url from the environment
		$testRemoteServerUrl = getenv('TEST_SERVER_FED_URL');
		if ($testRemoteServerUrl !== false) {
			$this->remoteBaseUrl = $testRemoteServerUrl;
		}
	}

	/**
	 * @Given /^using api version "(\d+)"$/
	 * @param string $version
	 */
	public function usingApiVersion($version) {
		$this->apiVersion = (int) $version;
	}

	/**
	 * @Given /^As an "([^"]*)"$/
	 * @param string $user
	 */
	public function asAn($user) {
		$this->currentUser = $user;
	}

	/**
	 * @Given /^Using server "(LOCAL|REMOTE)"$/
	 * @param string $server
	 * @return string Previous used server
	 */
	public function usingServer($server) {
		$previousServer = $this->currentServer;
		if ($server === 'LOCAL'){
			$this->baseUrl = $this->localBaseUrl;
			$this->currentServer = 'LOCAL';
			return $previousServer;
		} else {
			$this->baseUrl = $this->remoteBaseUrl;
			$this->currentServer = 'REMOTE';
			return $previousServer;
		}
	}

	/**
	 * @When /^sending "([^"]*)" to "([^"]*)"$/
	 * @param string $verb
	 * @param string $url
	 */
	public function sendingTo($verb, $url) {
		$this->sendingToWith($verb, $url, null);
	}

	/**
	 * Parses the xml answer to get ocs response which doesn't match with
	 * http one in v1 of the api.
	 * @param ResponseInterface $response
	 * @return string
	 */
	public function getOCSResponse($response) {
		return $response->xml()->meta[0]->statuscode;
	}

	/**
	 * This function is needed to use a vertical fashion in the gherkin tables.
	 * @param array $arrayOfArrays
	 * @return array
	 */
	public function simplifyArray($arrayOfArrays){
		$a = array_map(function($subArray) { return $subArray[0]; }, $arrayOfArrays);
		return $a;
	}

	/**
	 * @When /^sending "([^"]*)" to "([^"]*)" with$/
	 * @param string $verb
	 * @param string $url
	 * @param \Behat\Gherkin\Node\TableNode $body
	 */
	public function sendingToWith($verb, $url, $body) {
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php" . $url;
		$client = new Client();
		$options = [];
		if ($this->currentUser === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$this->currentUser, $this->regularUser];
		}
		$options['headers'] = [
			'OCS_APIREQUEST' => 'true'
		];
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			$options['body'] = $fd;
		}

		// TODO: Fix this hack!
		if ($verb === 'PUT' && $body === null) {
			$options['body'] = [
				'foo' => 'bar',
			];
		}

		try {
			$this->response = $client->send($client->createRequest($verb, $fullUrl, $options));
		} catch (ClientException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @When /^sending "([^"]*)" with exact url to "([^"]*)"$/
	 * @param string $verb
	 * @param string $url
	 */
	public function sendingToDirectUrl($verb, $url) {
		$this->sendingToWithDirectUrl($verb, $url, null);
	}

	public function sendingToWithDirectUrl($verb, $url, $body) {
		$fullUrl = substr($this->baseUrl, 0, -5) . $url;
		$client = new Client();
		$options = [];
		if ($this->currentUser === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$this->currentUser, $this->regularUser];
		}
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			$options['body'] = $fd;
		}

		try {
			$this->response = $client->send($client->createRequest($verb, $fullUrl, $options));
		} catch (ClientException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	public function isExpectedUrl($possibleUrl, $finalPart){
		$baseUrlChopped = substr($this->baseUrl, 0, -4);
		$endCharacter = strlen($baseUrlChopped) + strlen($finalPart);
		return (substr($possibleUrl,0,$endCharacter) == "$baseUrlChopped" . "$finalPart");
	}

	/**
	 * @Then /^the OCS status code should be "([^"]*)"$/
	 * @param int $statusCode
	 */
	public function theOCSStatusCodeShouldBe($statusCode) {
		PHPUnit_Framework_Assert::assertEquals($statusCode, $this->getOCSResponse($this->response));
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)"$/
	 * @param int $statusCode
	 */
	public function theHTTPStatusCodeShouldBe($statusCode) {
		PHPUnit_Framework_Assert::assertEquals($statusCode, $this->response->getStatusCode());
	}

	/**
	 * @Then /^the Content-Type should be "([^"]*)"$/
	 * @param string $contentType
	 */
	public function theContentTypeShouldbe($contentType) {
		PHPUnit_Framework_Assert::assertEquals($contentType, $this->response->getHeader('Content-Type'));
	}

	/**
	 * @param ResponseInterface $response
	 */
	private function extracRequestTokenFromResponse(ResponseInterface $response) {
		$this->requestToken = substr(preg_replace('/(.*)data-requesttoken="(.*)">(.*)/sm', '\2', $response->getBody()->getContents()), 0, 89);
	}

	/**
	 * @Given Logging in using web as :user
	 * @param string $user
	 */
	public function loggingInUsingWebAs($user) {
		$loginUrl = substr($this->baseUrl, 0, -5) . '/login';
		// Request a new session and extract CSRF token
		$client = new Client();
		$response = $client->get(
			$loginUrl,
			[
				'cookies' => $this->cookieJar,
			]
		);
		$this->extracRequestTokenFromResponse($response);

		// Login and extract new token
		$password = ($user === 'admin') ? 'admin' : '123456';
		$client = new Client();
		$response = $client->post(
			$loginUrl,
			[
				'body' => [
					'user' => $user,
					'password' => $password,
					'requesttoken' => $this->requestToken,
				],
				'cookies' => $this->cookieJar,
			]
		);
		$this->extracRequestTokenFromResponse($response);
	}

	/**
	 * @When Sending a :method to :url with requesttoken
	 * @param string $method
	 * @param string $url
	 */
	public function sendingAToWithRequesttoken($method, $url) {
		$baseUrl = substr($this->baseUrl, 0, -5);

		$client = new Client();
		$request = $client->createRequest(
			$method,
			$baseUrl . $url,
			[
				'cookies' => $this->cookieJar,
			]
		);
		$request->addHeader('requesttoken', $this->requestToken);
		try {
			$this->response = $client->send($request);
		} catch (ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When Sending a :method to :url without requesttoken
	 * @param string $method
	 * @param string $url
	 */
	public function sendingAToWithoutRequesttoken($method, $url) {
		$baseUrl = substr($this->baseUrl, 0, -5);

		$client = new Client();
		$request = $client->createRequest(
			$method,
			$baseUrl . $url,
			[
				'cookies' => $this->cookieJar,
			]
		);
		try {
			$this->response = $client->send($request);
		} catch (ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	public static function removeFile($path, $filename){
		if (file_exists("$path" . "$filename")) {
			unlink("$path" . "$filename");
		}
	}

	/**
	 * @Given User :user modifies text of :filename with text :text
	 * @param string $user
	 * @param string $filename
	 * @param string $text
	 */
	public function modifyTextOfFile($user, $filename, $text) {
		self::removeFile("../../data/$user/files", "$filename");
		file_put_contents("../../data/$user/files" . "$filename", "$text");
	}

	/**
	 * @Given file :filename is created :times times in :user user data
	 * @param string $filename
	 * @param string $times
	 * @param string $user
	 */
	public function fileIsCreatedTimesInUserData($filename, $times, $user) {
		for ($i = 0; $i < $times; $i++) {
			file_put_contents("../../data/$user/files" . "$filename-$i", "content-$i");
		}
	}

	public function createFileSpecificSize($name, $size) {
		$file = fopen("work/" . "$name", 'w');
		fseek($file, $size - 1 ,SEEK_CUR);
		fwrite($file,'a'); // write a dummy char at SIZE position
		fclose($file);
	}

	public function createFileWithText($name, $text){
		$file = fopen("work/" . "$name", 'w');
		fwrite($file, $text);
		fclose($file);
	}

	/**
	 * @Given file :filename of size :size is created in local storage
	 * @param string $filename
	 * @param string $size
	 */
	public function fileIsCreatedInLocalStorageWithSize($filename, $size) {
		$this->createFileSpecificSize("local_storage/$filename", $size);
	}

	/**
	 * @Given file :filename with text :text is created in local storage
	 * @param string $filename
	 * @param string $text
	 */
	public function fileIsCreatedInLocalStorageWithText($filename, $text) {
		$this->createFileWithText("local_storage/$filename", $text);
	}

	/**
	 * @When Sleep for :seconds seconds
	 * @param int $seconds
	 */
	public function sleepForSeconds($seconds) {
		sleep((int)$seconds);
	}

	/**
	 * @BeforeSuite
	 */
	public static function addFilesToSkeleton(){
		for ($i=0; $i<5; $i++){
			file_put_contents("../../core/skeleton/" . "textfile" . "$i" . ".txt", "Nextcloud test text file\n");
		}
		if (!file_exists("../../core/skeleton/FOLDER")) {
			mkdir("../../core/skeleton/FOLDER", 0777, true);
		}
		if (!file_exists("../../core/skeleton/PARENT")) {
			mkdir("../../core/skeleton/PARENT", 0777, true);
		}
		file_put_contents("../../core/skeleton/PARENT/" . "parent.txt", "Nextcloud test text file\n");
		if (!file_exists("../../core/skeleton/PARENT/CHILD")) {
			mkdir("../../core/skeleton/PARENT/CHILD", 0777, true);
		}
		file_put_contents("../../core/skeleton/PARENT/CHILD/" . "child.txt", "Nextcloud test text file\n");
	}

	/**
	 * @AfterSuite
	 */
	public static function removeFilesFromSkeleton(){
		for ($i=0; $i<5; $i++){
			self::removeFile("../../core/skeleton/", "textfile" . "$i" . ".txt");
		}
		if (is_dir("../../core/skeleton/FOLDER")) {
			rmdir("../../core/skeleton/FOLDER");
		}
		self::removeFile("../../core/skeleton/PARENT/CHILD/", "child.txt");
		if (is_dir("../../core/skeleton/PARENT/CHILD")) {
			rmdir("../../core/skeleton/PARENT/CHILD");
		}
		self::removeFile("../../core/skeleton/PARENT/", "parent.txt");
		if (is_dir("../../core/skeleton/PARENT")) {
			rmdir("../../core/skeleton/PARENT");
		}
	}

	/**
	 * @BeforeScenario @local_storage
	 */
	public static function removeFilesFromLocalStorageBefore(){
		$dir = "./work/local_storage/";
		$di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
		$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
		foreach ( $ri as $file ) {
			$file->isDir() ?  rmdir($file) : unlink($file);
		}
	}

	/**
	 * @AfterScenario @local_storage
	 */
	public static function removeFilesFromLocalStorageAfter(){
		$dir = "./work/local_storage/";
		$di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
		$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
		foreach ( $ri as $file ) {
			$file->isDir() ?  rmdir($file) : unlink($file);
		}
	}
}
