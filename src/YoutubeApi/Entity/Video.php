<?php

/**
 * @author Evgeniy Udodov <flr.null@gmail.com>
 */

namespace YoutubeApi\Entity;

use YoutubeApi\Entity;

class Video extends Entity {

    protected $_action = 'search';
    protected $_part = 'snippet';
    protected $_type = 'video';
}