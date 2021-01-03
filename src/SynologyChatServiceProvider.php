<?php

namespace Auoyi\Synology;

use Illuminate\Support\ServiceProvider;

class SynologyChatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('SynologyChat', function ($app) {
            return new SynologyChat($app['session'], $app['config']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__ . '/config/synology.php' => config_path('synology.php'), // 发布配置文件到 laravel 的config 下
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['SynologyChat'];
    }
}
