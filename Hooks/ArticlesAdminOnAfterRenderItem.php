<?php
namespace Plugins\MarkDown\Hooks;

use OroCMS\Admin\Stub;

class ArticlesAdminOnAfterRenderItem
{
    public function handle($view)
    {
        $buffer = (new Stub(__DIR__ . '/../Stubs/admin.markdown.stub', []))->render();
        $view->getFactory()->startPush('header', $buffer);
    }   
}