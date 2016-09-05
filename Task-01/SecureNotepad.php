<?php

class SecureNotepad extends SimpleNotepad
{
	protected $name;
	
	protected $password;
	
	public function __construct($pages_count, $name, $password)
	{
		for ($i = 0; $i < $pages_count; $i++) {
			$this->pages[] = new Page($title = '', $text = '');
		}
		
		$this->name = $name;
		
		$_GET[$this->name] = $password;
	}

	public function addText($text, $page_number)
	{
		if (!$this->checkPassword()) {
			return;
		} 
			
		$this->checkPageNumberInput($page_number);
	
		$this->pages[$page_number]->addText($text);
	}
	
	public function addTitle($title, $page_number)
	{
		if (!$this->checkPassword()) {
			return;
		}
		
		$this->checkPageNumberInput($page_number);
	
		$this->pages[$page_number]->addTitle($title);
	}
	
	public function replaceText($text, $page_number)
	{
		if (!$this->checkPassword()) {
			return;
		}
		
		$this->checkPageNumberInput($page_number);
	
		$this->pages[$page_number]->deleteText();
		$this->pages[$page_number]->addText($text);
	}
	
	public function deleteText($page_number)
	{
		if (!$this->checkPassword()) {
			return;
		}
		
		$this->checkPageNumberInput($page_number);
	
		$this->pages[$page_number]->deleteText();
	}
	
	public function getContent()
	{
		if (empty($this->pages)) {
			throw new Exception('The Notepad has no pages!');
		}
		
		if (!$this->checkPassword()) {
			return;
		}
	
		foreach ($this->pages as $key => $value) {
			echo 'Page ' . $key . ' ' . $value->getContent(), PHP_EOL;
		}
	}

	protected function checkPassword()
	{
		$promt = readline('Password: ');
		
		if ($promt == $_GET[$this->name]) {
			return true;
		}
		
		throw new Exception('Wrong Password!');
	}
}