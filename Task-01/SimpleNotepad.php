<?php

class SimpleNotepad extends AbstractNotepad
{
	public function __construct($pages_count)
	{
		for ($i = 0; $i < $pages_count; $i++) {
			$this->pages[] = new Page($title = '', $text = '');
		}
	}

	public function addText($text, $page_number)
	{
		$this->checkPageNumberInput($page_number);

		$this->pages[$page_number]->addText($text);
	}
	
	public function addTitle($title, $page_number)
	{
		$this->checkPageNumberInput($page_number);
	
		$this->pages[$page_number]->addTitle($title);
	}
	
	public function replaceText($text, $page_number)
	{
		$this->checkPageNumberInput($page_number);
		
		$this->pages[$page_number]->deleteText();
		$this->pages[$page_number]->addText($text);
	}
	
	public function deleteText($page_number)
	{
		$this->checkPageNumberInput($page_number);
		
		$this->pages[$page_number]->deleteText();
	}
	
	public function getContent()
	{
		if (empty($this->pages)) {
			throw new Exception('The Notepad has no pages!');
		}
		
		foreach ($this->pages as $key => $value) {
			echo 'Page ' . $key . ' ' . $value->getContent(), PHP_EOL;
		}
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
}