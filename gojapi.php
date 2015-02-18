<?php
/**
 * Goj Judger API
 */
class Judger{
	private $url = "";
	private $host = "";
	private $port = 80;
	private $password = "";
	private $login = false;

	function __construct($host, $port, $password){
		$this->host = $host;
		$this->port = $port;
		$this->password = $password;

		$this->url = "http://".$this->host.":".$this->port;
	}

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

	private function login($password){
		return false;
	}

	public function add_task(){
		;
	}

	public function get_status(){
		;
	}
}