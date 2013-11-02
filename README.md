youtube-api
===========

PHP Youtube API

Usage
-----

```php
$categoryId = 1;
$period = '-10 days';
$limit = 30;
$page = 'JqwdgHdq'; // Here you can specify pageToken from previous API result

$apiSearch = new YoutubeApi\Search($this->container['config']['youtube']['api_key']);
$videosData = $apiSearch->videos()
                        ->category($categoryId)
                        ->order('viewCount')
                        ->fromDate($period)
                        ->limit($limit)
                        ->page($page)
                        ->getList();
```

Install
------

```
"require": {
        "flrnull/youtube-api": "dev-master",
}
```

License
-------

MIT