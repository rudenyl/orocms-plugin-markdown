<?php 
namespace Plugins\MarkDown;

use Illuminate\Routing\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Response;

class MarkDownController extends Controller
{
    public function getStyles()
    {
        $content = $this->dumpAssetsAsString('css');

        $response = response(
            $content, 200, [
                'Content-Type' => 'text/css',
            ]
        );

        return $this->cacheResponse($response);
    }

    public function getJS()
    {
        $content = $this->dumpAssetsAsString('js');

        $response = response(
            $content, 200, [
                'Content-Type' => 'text/javascript',
            ]
        );

        return $this->cacheResponse($response);
    }

    public function getAssets($type)
    {
        $fs = new FileSystem;

        return $fs->glob(__DIR__ . '/Assets/**/**/*.' . $type);
    }

    /**
     * Return assets as a string
     *
     * @param type
     * @return string
     */
    public function dumpAssetsAsString($type)
    {
        $files = $this->getAssets($type);

        $content = '';
        foreach ($files as $file) {
            $content .= file_get_contents($file) . "\n";
        }

        return $content;
    }

    /**
     * Cache the response 1 year (31536000 sec)
     */
    protected function cacheResponse(Response $response)
    {
        $response->setSharedMaxAge(31536000);
        $response->setMaxAge(31536000);
        $response->setExpires(new \DateTime('+1 year'));

        return $response;
    }
}
