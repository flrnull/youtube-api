<?php

/**
 * @author Evgeniy Udodov <flr.null@gmail.com>
 */

namespace YoutubeApi;

abstract class Entity {

    /**
     * @var Engine
     */
    protected $_engine;

    protected $_regionCode;
    protected $_part;
    protected $_action;
    protected $_categoryHash;
    protected $_order;
    protected $_type;

    public function __construct(Engine $engine) {
        $this->_engine = $engine;
    }

    /**
     * @param string $regionCode
     * @return Entity
     */
    public function setRegionCode($regionCode) {
        $this->_regionCode = $regionCode;
        return $this;
    }

    /**
     * @param string $categoryHash
     * @return Entity
     */
    public function category($categoryHash) {
        $this->_categoryHash = $categoryHash;
        return $this;
    }

    /**
     * @param string $sortField
     * @return Entity
     */
    public function order($sortField) {
        $this->_order = $sortField;
        return $this;
    }

    /**
     * @return array
     */
    public function getList() {
        return $this->_engine
            ->action($this->_action)
            ->part($this->_part)
            ->regionCode($this->_regionCode)
            ->category($this->_categoryHash)
            ->order($this->_order)
            ->type($this->_type)
            ->execute();
    }

}