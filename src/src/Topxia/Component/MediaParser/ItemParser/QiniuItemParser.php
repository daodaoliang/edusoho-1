<?php
namespace Topxia\Component\MediaParser\ItemParser;

class QiniuItemParser extends AbstractItemParser
{

    private $patterns = array(
        'p1' => '/^http?:\/\/.+?[(\.mp4)|(\.swf)]/s',
    );

	public function parse($url)
	{
//        $item = array();
//
//        $item['id'] = md5($url);
//        $item['uuid'] = 'Qiniu:' . $item['id'];
//        $item['type'] = 'video';
//        $item['title'] = '1232';
//
//        $item['url'] = $url;
//        if (stripos($url, '.mp4') > 0) {
//            $item['mp4_url'] = $url;
//        } else {
//            $item['swf_url'] = $url;
//        }

        $item = array(
            "type"     => "video",
            "source"   => "Qiniu",
            "name"     => "Qiniu".md5(time().mt_rand(0, 1000)),
            "pictures" => array(
                "url" => ""),
            "files"    => array(
                array(
                    "url"  => $url,
                    "type" => "mp4"))
        );

        return $item;
	}

    public function detect($url)
    {
        return !! preg_match($this->patterns['p1'], $url);
    }

}