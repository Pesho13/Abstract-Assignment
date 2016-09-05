<?php

class ElectronicSecuredNotepad extends AbstractElectronicDevice
{
	protected $isStarted;
	
	public function addText($text, $page_number)
	{
		if (!$this->isStarted()) {
			return;
		}
		
		parent::addText($text, $page_number);
	}
	
	public function addTitle($title, $page_number)
	{
		if (!$this->isStarted()) {
			return;
		}
		
		parent::addTitle($title, $page_number);
	}
	
	public function replaceText($text, $page_number)
	{
		if (!$this->isStarted()) {
			return;
		}
		
		parent::replaceText($text, $page_number);
	}
	
	public function deleteText($page_number)
	{
		if (!$this->isStarted()) {
			return;
		}
		
		parent::deleteText($page_number);
	}
	
	public function getContent()
	{
		if (!$this->isStarted()) {
			return;
		}
		
		parent::getContent();
	}
	
	public function searchWord($word)
	{
		if (!$this->isStarted()) {
			return;
		}
		
		parent::searchWord($word);
	}
	
	public function printAllPagesWithDigits()
	{
		if (!$this->isStarted()) {
			return;
		}
		
		parent::printAllPagesWithDigits();
	}

	public function start()
	{
		$this->isStarted = true;
	}
	
	public function stop()
	{
		$this->isStarted = false;
	}
	
	public function isStarted()
	{
		if ($this->isStarted) {
			return true;
		}
	
		return false;
	}
}