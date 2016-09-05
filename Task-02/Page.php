<?php

class Page
{
	protected $title;
	
	protected $text;
	
	public function __construct($title, $text)
	{
		$this->title = $title;
		$this->text = $text;
	}
	
	public function addText($text)
	{
		$this->text = $this->text . ' ' . $text;
	}
	
	public function addTitle($title)
	{
		$this->title = $title;
	}
	
	public function deleteText()
	{
		$this->text = '';
	}
	
	public function getContent()
	{
		return sprintf('%s %s%s', $this->title, PHP_EOL, $this->text);
	}
	
	public function searchWord($word)
	{
		if (mb_strpos($this->text, $word, null, 'UTF-8')) {
			return true;
		}
		
		return false;
	}
	
	public function containsDigits()
	{
		if (preg_match('/[0-9]+/', $this->text)) {
			return true;
		}
		
		return false;
	}
}