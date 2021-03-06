<?php

namespace ZanPHP\HttpView;

use Zan\Framework\Utilities\Types\URL;
use ZanPHP\Contracts\Config\Repository;

class Js extends BaseLoader
{
    public function syncLoad($index, $vendor = false, $crossorigin = false)
    {
        $url = $this->getJsUrl($index, $vendor);
        echo "<script src=\"${url}\" onerror=\"_cdnFallback(this)\"";
        if ($crossorigin) {
            echo ' crossorigin="anonymous"';
        }
        echo "></script>";
        return true;
    }

    public function asyncLoad($index, $vendor = false)
    {
        $url = $this->getJsUrl($index, $vendor);
        if ($this->curBlock) {
            $this->blockResQueue[$this->curBlock][] = $url;
        } else {
            $this->noBlockResQueue[] = $url;
        }
        return true;
    }

    public function getJsUrl($index, $vendor = false)
    {
        $repository = make(Repository::class);
        $isUseCdn = $repository->get('js.use_js_cdn');
        $url = $project = '';
        if ($vendor !== false) {
            $url = URL::site($index, $isUseCdn ? $this->getCdnType() : 'static');
        } else {
            $arr = explode('.', $index, 2);
            if ($isUseCdn) {
                $url = URL::site($repository->get($index), $this->getCdnType());
            } else {
                $project = substr($arr[0], 8);
                $url = URL::site($project . '/' . $arr[1] . '/main.js', 'static');
            }
        }
        return $url;
    }

    public function replaceJs($html)
    {
        $asyncJsList = $this->_mergeAsyncJs();
        if (empty($asyncJsList)) return $html;
        $scriptStr = '_js_files=';
        $scriptStr = '<script>' . $scriptStr . json_encode($asyncJsList) . ';</script>';
        $bodyTagLastPos = strrpos($html, '</body>', -1);
        return substr($html, 0, $bodyTagLastPos) . $scriptStr . substr($html, $bodyTagLastPos);
    }

    private function _mergeAsyncJs()
    {
        $blockResQueue = [];
        foreach ($this->blockResQueue as $block => $jsList) {
            $blockResQueue = array_merge($blockResQueue, $jsList);
        }
        return array_values(array_unique(array_merge($blockResQueue, $this->noBlockResQueue)));
    }
}
