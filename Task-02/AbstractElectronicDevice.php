<?php

abstract class AbstractElectronicDevice extends SecureNotepad
{
	abstract protected function start();
	
	abstract protected function stop();
	
	abstract protected function isStarted();
}