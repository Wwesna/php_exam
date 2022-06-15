<?php
require_once 'iFile.php';

	class file implements iFile
	{
    	private $fl;

    	public function __construct($filePath)
    	{
        	$this->fl = $filePath;
    	}

    	public function getPath()
    	{
        	return $this->fl;
    	}

    	public function getDir()
    	{
        	$path_parts = pathinfo($this->fl);
        	return $path_parts['dirname'];
    	}

    	public function getName()
    	{
        	$path_parts = pathinfo($this->fl);
        	return $path_parts['basename'];
    	}

    	public function getExt()
    	{
        	$path_parts = pathinfo($this->fl);
        	return $path_parts['extension'];
    	}

    	public function getSize()
    	{
        	return filesize($this->fl);
    	}

    	public function getText()
    	{
        	return file_get_contents($this->lf);
    	}

    	public function setText($text)
    	{
        	file_put_contents($this->fl, $text);

    	}

    	public function appendText($text)
    	{
        	$current = file_get_contents($this->fl);
        	$current .= $text;
        	file_put_contents($this->f, $current);
    	}

    	public function copy($copyPath)
    	{
        	copy($this->fl, $copyPath);
    	}

    	public function delete()
    	{
        	unlink($this->fl);
    	}

    	public function rename($newName)
    	{
        	rename($this->fl, $newName);
    	}

    	public function replace($newPath)
    	{
        	copy($this->fl, $newPath);
        	unlink($this->fl);
        	$this->fl = $newPath;
    	}
	}
?>