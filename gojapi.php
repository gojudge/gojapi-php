<?php
/**
 * Goj Judger API
 * @author Rex Lee <duguying2008@gmail.com>
 * @version 0.0.1
 */
class Judger{
	private $url = "";
	private $host = "";
	private $port = 1005;
	private $password = "";
	private $login = false;

	function __construct($host, $port, $password){
		$this->host = $host;
		$this->port = $port;
		$this->password = $password;
		$this->url = "http://".$this->host.":".$this->port;

		$this->login = $this->login($this->password);
	}

	/**
	 * http post method
	 * @param  string $post_string request body
	 * @return string              response
	 */
	private function post($post_string){
		$remote_server = $this->url;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $remote_server);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERAGENT, "Goj Client API");
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	/**
	 * login
	 * @param  string $password password
	 * @return bool           login result
	 */
	private function login($password){
		$requ = json_encode(array('action' => "login", 'password' => $password));
		$resp = $this->post($requ);

		// echo $resp, "\n";

		$resp_obj = json_decode($resp);
		if ($resp_obj->result == true) {
			$this->sid = $resp_obj->sid;
			return true;
		}else{
			return false;
		}
	}

	/**
	 * add task
	 * @param int $id       id
	 * @param string $language language
	 * @param string $code     code
	 * @param string $type     task type
	 * @param array $io_data  io test data
	 */
	public function add_task($id, $language, $code, $type, $io_data){
		$requ = json_encode(array(
			'action' => "task_add", 
			'sid' => $this->sid,
			'time' => time(),
			'language' => $language,
			'code' => htmlspecialchars($code),
			'type' => $type,
			'io_data' => $io_data,
			));

		$resp = $this->post($requ);
		return $resp;
	}

	public function get_status(){
		;
	}
}