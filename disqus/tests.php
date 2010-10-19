<?php

date_default_timezone_set('America/Los_Angeles');

define('DISQUS_API_URL', 'http://dev.disqus.org:8000/api/');

require_once('PHPUnit/Framework.php');
require_once(dirname(__FILE__) . '/disqus.php');
require_once(dirname(__FILE__) . '/json.php');

define('USER_API_KEY', $_SERVER['argv'][count($_SERVER['argv'])-1]);

if (strlen(USER_API_KEY) != 64) {
	die('Syntax: phpunit tests.php <user_api_key>');
}

class DisqusAPITest extends PHPUnit_Framework_TestCase {
	public function test_get_user_name() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);
		$response = $dsq->get_user_name();
		
		$this->assertTrue($response !== false);
	}

	public function test_get_forum_list() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);
		$response = $dsq->get_forum_list();
		
		$this->assertTrue($response !== false);
	}
	
	/**
	 * @depends test_get_forum_list
	 */
	public function test_get_forum_api_key() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);

		$response = $dsq->get_forum_list();
		$forum_id = $response[0]->id;
		
		$response = $dsq->get_forum_api_key($forum_id);
		
		$this->assertTrue($response !== false);
	}
	
	/**
	 * @depends test_get_forum_list
	 */
	public function test_get_forum_posts() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);

		$response = $dsq->get_forum_list();
		$this->assertTrue($response !== false);

		$forum_id = $response[0]->id;
		
		$response = $dsq->get_forum_posts($forum_id);
		$this->assertTrue($response !== false);
	}
	
	/**
	 * @depends test_get_forum_posts
	 */
	public function test_get_num_posts() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);

		$response = $dsq->get_forum_list();
		$this->assertTrue($response !== false);

		$forum_id = $response[0]->id;
		
		$response = $dsq->get_forum_posts($forum_id);
		$this->assertTrue($response !== false);

		$thread_id = $response[0]->thread->id;

		$response = $dsq->get_num_posts(array($thread_id));
		$this->assertTrue($response !== false);
	}
	
	/**
	 * @depends test_get_forum_list
	 */
	public function test_get_categories_list() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);

		$response = $dsq->get_forum_list();
		$this->assertTrue($response !== false);

		$forum_id = $response[0]->id;
		
		$response = $dsq->get_categories_list($forum_id);
		$this->assertTrue($response !== false);
	}
	
	/**
	 * @depends test_get_forum_list
	 */
	public function test_get_thread_list() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);

		$response = $dsq->get_forum_list();
		$this->assertTrue($response !== false);

		$forum_id = $response[0]->id;
		
		$response = $dsq->get_thread_list($forum_id);
		$this->assertTrue($response !== false);
	}
	
	/**
	 * @depends test_get_forum_list
	 */
	public function test_get_updated_threads() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);

		$response = $dsq->get_forum_list();
		$this->assertTrue($response !== false);

		$forum_id = $response[0]->id;
		
		$response = $dsq->get_updated_threads($forum_id, time());
		$this->assertTrue($response !== false);
	}
	
	/**
	 * @depends test_get_forum_posts
	 */
	public function test_get_thread_posts() {
		$dsq = new DisqusAPI(USER_API_KEY, null, DISQUS_API_URL);

		$response = $dsq->get_forum_list();
		$this->assertTrue($response !== false);

		$forum_id = $response[0]->id;
		
		$response = $dsq->get_forum_posts($forum_id);
		$this->assertTrue($response !== false);

		$thread_id = $response[0]->thread->id;

		$response = $dsq->get_thread_posts($thread_id);
		$this->assertTrue($response !== false);
	}
	
	public function test_json() {
		$subjects = array(
			"[1, 2, 3]",
			"{foo: 'bar'}",
			"{foo: 'bar', 1: true, 2: false, 3: nil, 4: [1, 2, 3]}",
			// "'hello'",
			// "true",
			// "false",
			// "nil",
			// "1",
		);
		
		foreach ($subjects as $v) {
			$json = new JSON;
			
			$this->assertEquals($json->unserialize($v), json_decode($v));
		}
	}
}

?>