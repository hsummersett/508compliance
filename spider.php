<?php

/**
 *
 * @author emmanueljohn
 */
class Spider {
    private $url;
    private $depth;
    
    public function getUrl() {
        return $this->url;
    }

    public function getDepth() {
        return $this->depth;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setDepth($depth) {
        $this->depth = $depth;
    }
    
    public function startCrawl(){
        //TODO start crawl here
    }

}
