<?php
/**
 * Feed Generator
 * 
 * Generates RSS/Atom feeds
 * 
 * @package	FeedGenerator
 * @author	Mateusz 'MatheW' Wójcik
 * @copyright 	2007 Mateusz 'MatheW' Wójcik
 * @link	http://mwojcik.pl
 * @license	GPL
 * @version	v1.2
 * @link	http://mwojcik.pl/FeedGenerator/
 */

require_once('channel.php');
require_once('item.php');
require_once('generators/generator.class.php');
require_once('generators/rssgenerator.class.php');
require_once('generators/atomgenerator.class.php');
/**
 * Klasa FeedGenerator
 * 
 * Creates feed
 * 
 * 
 * Through magic method __call all methods of Channel Object are available in FeedGenerator Object
 * 
 * Example: 
 * <pre>
 * try {	
 *		include('FeedGenerator.php');
 *		$feeds=new FeedGenerator;
 *		$feeds->setGenerator(new RSSGenerator); # or AtomGenerator
 *		$feeds->setAuthor('mat.wojcik@gmail.com (MatheW Wojcik)');
 *		$feeds->setTitle('Example Site');
 *		$feeds->setChannelLink('http://example.com/rss/');
 *		$feeds->setLink('http://example.com');
 *		$feeds->setDescription('Description of channel');
 *		$feeds->setID('http://example.com/rss/');
 *	
 *		$feeds->addItem(new FeedItem('http://example.com/1', 'Example news', 'http://example.com/1', '<p>Description of news</p>'));
 *		$feeds->addItem(new FeedItem('http://example.com/2', 'Example news', 'http://example.com/2', '<p>Description of news</p>'));
 *	
 *		$feeds->display();
 *	}
 *	catch(FeedGeneratorException $e){
 *		echo 'Error: '.$e->getMessage();
 *	}
 * </pre>
 * 
 * @package	FeedGenerator
 * @author	Mateusz 'MatheW' Wójcik
 * @version	1.1 
 *
 */
class FeedGenerator {
	/**
	 * Generator
	 *
	 * @var Generator
	 */
	private $_generator;
	/**
	 * Channel
	 *
	 * @var Channel
	 */
	private $_channel;
	/**
	 * Generated content
	 *
	 * @var string
	 */
	private $generated;


    public function __construct() {
    	$this->_channel=new Channel();
    }
	/**
	 * @param Generator $generator Generator strategy (RSS/Atom)
	 */
    public function setGenerator(Generator $generator){
        $this->_generator=$generator;
        $this->_channel->setGeneratorName($this->_generator->generatorName());
    }
	/**
	 * Generates XML code
	 * @throws FeedGeneratorException
	 */
    public function generate(){
    	if(!$this->_generator instanceof Generator) throw new FeedGeneratorException('There has been no generator strategy set.');
        $this->generated=$this->_generator->generate($this->_channel);
    }

    /**
     * Shows content
     * 
     * @throws FeedGeneratorException
     */
    public function show(){
    	if(empty($this->generated)) throw new FeedGeneratorException('Channel has not been generated yet.');
		echo $this->generated;
    }
    
    /**
     * Generates and shows channel
     *
     * @param bool $headers If true it sends xml headers 
     * @throws FeedGeneratorException
     */
    public function display($headers=true){
    	$this->generate();
    	if($headers) header('Content-type: application/xml; charset=utf-8');
    	$this->show();
    }

    /**
     * Returns generated XML code
     * @return string XML code
     */
	public function getGenerated(){
		return $this->generated;
	}
    public function __call($funcName, $params){
        if(method_exists($this->_channel, $funcName)) call_user_func_array(array($this->_channel, $funcName), $params);
    }


}


/**
 * Get date in RFC3339
 * For example used in XML/Atom
 *
 * @param integer $timestamp
 * @return string date in RFC3339
 * @author Boris Korobkov
 * @see http://tools.ietf.org/html/rfc3339
 */
function date3339($timestamp=0) {

    if (!$timestamp) {
        $timestamp = time();
    }
    $date = date('Y-m-d\TH:i:s', $timestamp);

    $matches = array();
    if (preg_match('/^([\-+])(\d{2})(\d{2})$/', date('O', $timestamp), $matches)) {
        $date .= $matches[1].$matches[2].':'.$matches[3];
    } else {
        $date .= 'Z';
    }
    return $date;

}



class FeedGeneratorException extends Exception {
	
}
?>