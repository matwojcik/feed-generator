`FeedGenerator` is PHP library for RSS/Atom channel generation.

url: http://blog.mwojcik.pl/2007/11/30/feedgenerator-generator-kanalow-rss-atom-w-php/

Example:

    try {
        include('FeedGenerator.php');
        $feeds=new FeedGenerator;
        $feeds->setGenerator(new RSSGenerator); # or AtomGenerator
        $feeds->setAuthor('mat.wojcik@gmail.com (MatheW Wojcik)');
        $feeds->setTitle('Example Site');
        $feeds->setChannelLink('http://example.com/rss/');
        $feeds->setLink('http://example.com');
        $feeds->setDescription('Description of channel');
        $feeds->setID('http://example.com/rss/');
     
        $feeds->addItem(new FeedItem('http://example.com/news/1', 'Example news', 'http://example.com/news/1', '<p>Description of news</p>'));
        $feeds->addItem(new FeedItem('http://example.com/news/2', 'Example news', 'http://example.com/news/2', '<p>Description of news</p>'));
     
        $feeds->display();
    }
    catch(FeedGeneratorException $e){
        echo 'Error: '.$e->getMessage();
    }
