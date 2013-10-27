<?php

/**
 * @author Evgeniy Udodov <flr.null@gmail.com>
 */

namespace YoutubeApi;

use YoutubeApi\Entity\Category;
use YoutubeApi\Entity\Video;

class Search extends Action {

    /**
     * @param string $countryIso
     * @return Category
     */
    public function categories($countryIso) {
        $category = new Category($this->_engine);
        $category->setRegionCode($countryIso);
        return $category;
    }

    /**
     * @return Video
     */
    public function videos() {
        $videos = new Video($this->_engine);
        return $videos;
    }

}