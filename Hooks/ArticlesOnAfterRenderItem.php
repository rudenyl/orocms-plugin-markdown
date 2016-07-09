<?php
namespace Plugins\MarkDown\Hooks;

use OroCMS\Admin\Stub;

class ArticlesOnAfterRenderItem
{
    public function handle($view)
    {
        $buffer = (new Stub(__DIR__ . '/../Stubs/markdown.stub', []))->render();
        $view->snippets[] = $buffer;
    }   
}