<?php
/**
 * 
 * RSS/Atom Channel
 * 
 */
class Channel{
    public
		$id, $title, $link, $description,
		$copyright, $author, $language,
		$webmaster, $lastBuildDate,  $generator, $pubDate, $channelLink;

	private $_items;

	/**
	 * Returns feed items
	 *
	 * @return array Array containing FeedItem objects
	 */
	public function getItems(){
	    return $this->_items;
	}
	/**
	 * Sets id of channel
	 *
	 * @param string $id
	 */
	public function setID($id){
	    $this->id=$id;
	}

	/**
	 * Adds new FeedItem
	 * 
	 * Example:
	 * <pre>
	 * $channel->addItem(new FeedItem('http://example.com/news/1', 'Example news', 'http://example.com/news/1', '<p>Description of news</p>'));
	 * </pre>
	 *
	 * @param FeedItem $item FeedItem
	 */
	 public function addItem(FeedItem $item){
	     $this->_items[]=$item;
	 }
	/**
	 * Sets channel's title
	 *
	 * @param string $title
	 */
	public function setTitle($title){
	    $this->title=$title;
	}
	/**
	 * Sets link to site
	 *
	 * @param string $link
	 */
	public function setLink($link){
	    $this->link=$link;
	}
	/**
	 * Sets description of channel
	 *
	 * @param string $description
	 */
	public function setDescription($description){
	    $this->description=$description;
	}
	/**
	 * Sets copyright
	 *
	 * @param string $copyright
	 */
	public function setCopyright($copyright){
	    $this->copyright=$copyright;
	}
	
	/**
	 * Sets link to channel
	 *
	 * @param string $channelLink
	 */
	public function setChannelLink($channelLink){
		$this->channelLink=$channelLink;
	}
	
	/**
	 * Sets author
	 *
	 * @param string $Author
	 */
	public function setAuthor($author){
	    $this->author=$author;
	}
	/**
	 * Sets language
	 *
	 * @param string $Language
	 */
	public function setLanguage($language){
	    $this->language=$language;
	}
	/**
	 * Sets Webmaster
	 *
	 * @param string $Webmaster
	 */
	public function setWebmaster($webmaster){
	    $this->webmaster=$webmaster;
	}
	/**
	 * Sets date of last build of channel
	 *
	 * @param string $LastBulidDate
	 */
	public function setLastBulidDate($lastBulidDate){
	    $this->lastBulidDate=$lastBulidDate;
	}
	/**
	 * Sets generator's name
	 *
	 * @param string $Generator
	 */
	public function setGeneratorName($generator){
	    $this->generator=$generator;
	}
	/**
	 * Sets publication date
	 *
	 * @param string $PubDate
	 */
	public function setPubDate($PubDate){
	    $this->pubDate=$PubDate;
	}
}
?>
