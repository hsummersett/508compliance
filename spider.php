<?php

/**
 *
 * @author emmanueljohn
 */
class Spider {

    private $sUrl;
    private $iDepth = 1; //crawl depth is one by default
    private $oCh;
    private $sErrorMsg;

    public function __construct() {
        $aWebpages = array();
    }

    public function getSUrl() {
        return $this->sUrl;
    }

    public function getIDepth() {
        return $this->iDepth;
    }

    public function setSUrl($sUrl) {
        $this->sUrl = $sUrl;
    }

    public function setIDepth($iDepth) {
        $this->iDepth = $iDepth;
    }

    public function start() {
        if (!$this->sUrl) {
            $this->sErrorMsg = "ERROR: No URL passed to spider ";
            return false;
        }

        $oCh = curl_init();

        // set URL and other appropriate options
        curl_setopt($oCh, CURLOPT_URL,$this->sUrl);
        curl_setopt($oCh, CURLOPT_HEADER, 0);
        curl_setopt($oCh, CURLOPT_RETURNTRANSFER, true);
        // grab the response and parse for links and nodes with styles
        $oResponse = curl_exec($oCh);
        $oDom = new DOMDocument();

        @$oDom->loadHTML($oResponse);
        
        require_once __DIR__.'Webpage.php';
        
        $oPage = new Webpage();
        $oPage->setContent($oResponse);
        $oPage->setLinks($oDom->getElementsByTagName("a"));
        $oPage->setPageUrl($this->sUrl);
        //save webpage
        $this->saveWebPage($oPage);
        
        return true;
    }

    public function getSErrorMsg() {
        return $this->sErrorMsg;
    }
    private function saveWebPage($oPage){
        //TODO retrieve non compliant elements and save to database;
    }

}
