<?php

/**
 * @author Evgeniy Udodov <flr.null@gmail.com>
 */

namespace YoutubeApi;

class Engine {

    const API_URL = "https://www.googleapis.com/youtube/v3/";

    /**
     * @var string
     */
    protected $_apiKey;

    /**
     * @var string
     */
    protected $_actionName;

    /**
     * @var string
     */
    protected $_part = "snippet";

    /**
     * @var string
     */
    protected $_regionCode;

    /**
     * @var string
     */
    protected $_categoryId;

    /**
     * @var string
     */
    protected $_order;

    /**
     * @var int
     */
    protected $_maxResults = 10;

    /**
     * @var string
     */
    protected $_fromDate;

    /**
     * @var string
     */
    protected $_type;

    /**
     * @var string
     */
    protected $_page;

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey) {
        $this->_apiKey = $apiKey;
    }

    /**
     * @return array
     */
    public function execute() {
        $apiUrl = self::API_URL . $this->_actionName . "?part=" . $this->_part;
        if (!is_null($this->_regionCode)) {
            $apiUrl .= '&regionCode=' . $this->_regionCode;
        }
        if (!is_null($this->_order)) {
            $apiUrl .= '&order=' . $this->_order;
        }
        if (!is_null($this->_maxResults)) {
            $apiUrl .= '&maxResults=' . $this->_maxResults;
        }
        if (!is_null($this->_categoryId)) {
            $apiUrl .= '&videoCategoryId=' . $this->_categoryId;
        }
        if (!is_null($this->_type)) {
            $apiUrl .= '&type=' . $this->_type;
        }
        if (!is_null($this->_fromDate)) {
            $apiUrl .= '&publishedAfter=' . date('Y-m-d\TH:i:s\Z', strtotime($this->_fromDate));
        }
        if (!is_null($this->_page)) {
            $apiUrl .= '&pageToken=' . $this->_page;
        }
        $apiUrl .= "&key=" . $this->_apiKey;

        $this->_cleanUp();
        return json_decode(file_get_contents($apiUrl), true);
    }

    /**
     * @param string $actionName
     * @return $this
     */
    public function action($actionName) {
        $this->_actionName = $actionName;
        return $this;
    }

    /**
     * @param string $part
     * @return $this
     */
    public function part($part) {
        $this->_part = $part;
        return $this;
    }

    /**
     * @param string $regionCode
     * @return Engine
     */
    public function regionCode($regionCode) {
        $this->_regionCode = $regionCode;
        return $this;
    }

    /**
     * @param string $categoryId
     * @return Engine
     */
    public function category($categoryId) {
        $this->_categoryId = $categoryId;
        return $this;
    }

    /**
     * @param string $sort
     * @return Engine
     */
    public function order($sort) {
        $this->_order = $sort;
        return $this;
    }

    /**
     * @param int $max
     * @return Engine
     */
    public function maxResults($max) {
        $this->_maxResults = $max;
        return $this;
    }

    /**
     * @param string $fromDate
     * @return Engine
     */
    public function fromDate($fromDate) {
        $this->_fromDate = $fromDate;
        return $this;
    }

    /**
     * @param string $type
     * @return Engine
     */
    public function type($type) {
        $this->_type = $type;
        return $this;
    }

    /**
     * @param string $page
     * @return Engine
     */
    public function page($page) {
        $this->_page = $page;
        return $this;
    }

    protected function _cleanUp() {
        $this->_regionCode = null;
        $this->_part = null;
        $this->_order = null;
        $this->_categoryId = null;
    }

}