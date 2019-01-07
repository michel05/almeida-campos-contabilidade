<?php

/**
 * Runtime PHP Debugger Client Library
 *
 * @package		Sandbox.Debugger
 * @author		Sean Nieuwoudt
 * @copyright	Copyright (c) 2008, iSean.co.za
 * @license     GNU General Public License
 */
 
 # | 
 # | Prototype:
 # |
 # | $debugger = new Debugger(); 
 # | $debugger->Write('test data', _NOTICE);
 # | OR
 # | $debugger->Debug($this);
 # | 
 

class Debugger
{
	/**
	 * Properties
	 */
	private $address = null;
	private $port    = null;	 
	 
   /**
    * Debugger::__construct($addr = '127.0.0.1', $port = 1304)
    *
    * Debugger constructor
    *
    * @param string $addr
    * @param int $port
    * @return object
    */
	public function __construct($addr = '127.0.0.1', $port = 1304)
	{
		if(!defined("_DEBUG"))  { define("_DEBUG"  , 0); }
		if(!defined("_INFO"))   { define("_INFO"   , 1); }
		if(!defined("_NOTICE")) { define("_NOTICE" , 2); }
		if(!defined("_WARNING")){ define("_WARNING", 3); }
		if(!defined("_ERROR"))  { define("_ERROR"  , 4); }
		
		$this->address = $addr;
		$this->port = $port;
	}	
	
   /**
    * Debugger::Write($msg)
    *
    * Write data to socket listener
    *
    * Level 0 - Debug   [_DEBUG]
    * Level 1 - Info    [_INFO]
    * Level 2 - Notice  [_NOTICE]
    * Level 3 - Warning [_WARNING]
    * Level 4 - Error   [_ERROR]
    *
    * @return void
    */
	public function Write($msg, $level = 1, $doWrite = true)
	{
		if(!$doWrite){
			return false;
		}
		
		$msg = utf8_encode($msg);
		
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if($socket === FALSE){
			die("Debugger::Exception - Unable to create socket object.");
		}
		
		$result = @socket_connect($socket, $this->address, $this->port);
		if($result === FALSE){
			die("Debugger::Exception - Unable to connect to : " . $this->address . " | " . $this->port);
		}
		
		switch($level){
			case 0: // Debug
				$msg = $this->Header(_DEBUG) . $msg ;
				
				break;
								
			case 1: // Info
				$msg = $this->Header(_INFO) . $msg ;
				break;
				
			case 2: // Notice
				$msg = $this->Header(_NOTICE) . $msg;
				break;
			
			case 3: // Warning
				$msg = $this->Header(_WARNING) . $msg;
				break;
			
			case 4: // Error
				$msg = $this->Header(_ERROR) . $msg;
				break;
			
			default: // Info
				$msg = $this->Header(_INFO) . $msg;
		}
		socket_write($socket, $msg, strlen($msg));
		socket_close($socket);
	}

   /**
    * Debugger::Debug($v)
    *
    * Print out object
    *
    * @param mixed $v
    * @return void
    */
	public function Debug($v)
	{
		ob_start();
		    print_r($v); $buffer = ob_get_contents();
	    ob_end_clean();
	    
		if($this->Write($buffer, _DEBUG)){
			return true;
		} else {
			return false;
		}
	}

   /**
    * Debugger::Header($level)
    *
    * Build output header
    *
    * @access private
    * @param int $level
    * @return void
    */	
	private function Header($level)
	{
		switch($level){
			case 0:
				return "\n".
					   "-----------------------------------------------\n".
					   "-              Debugging @ ". date("H:i:s") ."           -\n".
					   "-----------------------------------------------\n\n";
				break;
				
			case 1:
				return "\n".
					   "-----------------------------------------------\n".
					   "-             Information @ ". date("H:i:s") ."          -\n".
					   "-----------------------------------------------\n\n";
				break;
				
			case 2:
				return "\n".
					   "-----------------------------------------------\n".
					   "-               Notice @ ". date("H:i:s") ."             -\n".
					   "-----------------------------------------------\n\n";
				break;
				
			case 3:
				return "\n".
					   "-----------------------------------------------\n".
					   "-               Warning @ ". date("H:i:s") ."            -\n".
					   "-----------------------------------------------\n\n";
				break;
				
			case 4:
				return "\n".
					   "-----------------------------------------------\n".
					   "-                Error @ ". date("H:i:s") ."             -\n".
					   "-----------------------------------------------\n\n";
				break;
		}
	}
	
   /**
    * Debugger::Address($val = null)
    *
    * Set or get address value
    *
    * @return string
    */
	public function Address($val = null)
	{
		if($val == null){
			return $this->address;
		} else {
			$this->address = $val;
		}
	}

   /**
    * Debugger::Port($val = null)
    *
    * Set or get port value
    *
    * @return string
    */	
	public function Port($val = null)
	{
		if($val == null){
			return $this->port;
		} else {
			$this->port = $val;
		}
	}
}

?>
