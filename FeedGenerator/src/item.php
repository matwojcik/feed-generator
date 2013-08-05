<?php
/**
 * 
 * Represents each news, entry etc.
 *
 *  
 * @package FeedGenerator
 * @author 	Mateusz 'MatheW' Wójcik
 */

 class FeedItem {
	/**
	 * Title of item
	 * @var string
	 */
    public $title;
    /**
     * Link to item
     *
     * @var string
     */     
    public $link;
    /**
     * Description of item
     *
     * @var string
     */
    public $description;
    /**
     * Author of item
     *
     * @var string
     */
    public $author;
    /**
     * Date of publication
     *
     * @var string
     */
    public $pubDate;
    /**
     * Id of item
     *
     * @var string
     */
    public $id;
    /**
     * Date of last update
     *
     * @var string
     */
    public $updated;

    /**
     *
	 * @param string $id ID
 	 * @param string $title Title of item
 	 * @param string $link Link to item
 	 * @param string $description Description of item
 	 * @param string $updated Date of last update
     */
    public function __construct($id, $title, $link, $description, $updated=''){
        $this->id=$id;
        $this->title=$title;
        $this->link=$link;
        $this->description=$description;
        $this->updated=$updated;
    }
}
?>
