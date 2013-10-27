<?php

/**
 * @author Evgeniy Udodov <flr.null@gmail.com>
 */

namespace YoutubeApi\Entity;

use YoutubeApi\Entity;

class Category extends Entity {

    protected $_action = 'videoCategories';
    protected $_part = 'snippet';
}