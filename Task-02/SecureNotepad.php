<?php

class SecureNotepad extends AbstractNotepad
{
	protected $name;
	
	protected $password;
	
	public function __construct($pages_count, $name, $password)
	{
		if (!$this->validatePassword($password)) {
			throw new Exception('Invalid password!');
		}
		
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
	
	protected function validatePassword($password)
	{
		if (strlen($password) >=5 && preg_match('/[a-z]+/', $password) && preg_match('/[A-Z]+/', $password)) {
			return true;
		}
		
		return false;
	}

	protected function checkPassword()
	{
		$promt = readline('Password: ');
		
		if ($promt == $_GET[$this->name]) {
			return true;
		}
		
		throw new Exception('Wrong Password!');
	}
	
	protected function checkPageNumberInput($page_number)
	{
		if (!is_int($page_number)) {
			throw new Exception('$page_number must be integer');
		}
	
		if (!isset($this->pages[$page_number])) {
			throw new Exception('This page does not exist!');
		}
	
	}
	
	public function searchWord($word)
	{
		if (!$this->checkPassword()) {
			return;
		}
		
		$pages = [];
		
		foreach ($this->pages as $key => $value) {
			if ($value->searchWord($word)) {
				$pages[] = $key;
			}
		}
		
		if (!empty($pages)) {
			$string = implode(',', $pages);
			echo sprintf('Pages %s has word %s!', $string, $word), PHP_EOL;
		} else {
			echo sprintf('The word %s does not exist in any page!', $word), PHP_EOL;
		}
	}
	
	public function printAllPagesWithDigits()
	{
		if (!$this->checkPassword()) {
			return;
		}
		
		$flag = false;
		
		foreach ($this->pages as $value) {
			if ($value->containsDigits()) {
				echo $value->getContent(), PHP_EOL;
				$flag = true;
			} 
		}
		if (!$flag) {
			echo sprintf('No digits were found!'), PHP_EOL;
		}
	}

}




