<?php

/**
 * Description of Webpage
 *
 * @author emmanueljohn
 */
class Webpage {
    
    private $content;
    private $links;
    private $pageUrl;
    function __construct() {
        
    }

    public function getContent() {
        return $this->content;
    }

    public function getLinks() {
        return $this->links;
    }

    public function getPageUrl() {
        return $this->pageUrl;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setLinks($links) {
        $this->links = $links;
    }

    public function setPageUrl($pageUrl) {
        $this->pageUrl = $pageUrl;
    }
}
