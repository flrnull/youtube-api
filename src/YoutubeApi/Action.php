<?php

/**
 * @author Evgeniy Udodov <flr.null@gmail.com>
 */

namespace YoutubeApi;

abstract class Action {

    /**
     * @var Engine
     */
    protected $_engine;

    /**
     * @param string $apiKey
     */
    public function __construct($apiKey) {
        $this->_engine = new Engine($apiKey);
    }

}