<?php

abstract class AbstractNotepad
{
	protected $pages;
	
	abstract protected function addText($text, $page_number);
	
	abstract protected function addTitle($title, $page_number);
	
	abstract protected function replaceText($text, $page_number);
	
	abstract protected function deleteText($page_number);
	
	abstract protected function getContent();
}