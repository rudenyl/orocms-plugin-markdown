<?php 
namespace Plugins\MarkDown;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $config = [
            'prefix' => 'plugin-markdown',
            'namespace' => 'Plugins\MarkDown'
        ];

        $this->app['router']->group($config, function($router) {
            $router->get('assets.css', [
                'uses' => 'MarkDownController@getStyles',
                'as' => 'plugin-markdown.assets.css',
            ]);

            $router->get('assets.js', [
                'uses' => 'MarkDownController@getJS',
                'as' => 'plugin-markdown.assets.js',
            ]);
        });
    }
}
