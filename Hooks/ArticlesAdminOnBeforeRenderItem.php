<?php
namespace Plugins\MarkDown\Hooks;

use OroCMS\Admin\Stub;

class ArticlesAdminOnBeforeRenderItem
{
    public function handle($article)
    {
    	$article->description = preg_replace('|<markdown>(.*?)<\/markdown>|sU', '$1', $article->description);
    }
}