<?php

class Request{

	private $controller;
	private $function;
	private $arguments;

	public function __contruct()
	{
		if (isset($_GET['url'])) {
			$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			$url = array_filter($url);

			$this->controller = strtolower(array_shift($url));
			$this->function = strtolower(array_shift($url));
			$this->arguments = $url;
		}


		if (!$this->controller) {
			$this->controller = DEFAULT_CONTROLLER;			
		}

		if (!$this->function) {
			$this->controller = 'index';
		}

		if (!isset($this->arguments)) {
			$this->arguments = array();
		}

	}


	public function getController()
	{
		return $this->controller;
	}

	public function getfunction()
	{
		return $this->function;
	}

	public function getArguments()
	{
		return $this->arguments;
	}

	public function isAjax(){
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	}
}
