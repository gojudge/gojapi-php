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

	private post(string content){
		return "";
	}

	private login($password){
		return false;
	}

	public add_task(){
		;
	}

	public get_status(){
		;
	}
}