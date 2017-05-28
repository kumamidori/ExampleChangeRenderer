<?php
namespace Kumamidori\ExampleChangeRenderer\Module;

use BEAR\Package\PackageModule;
use BEAR\Resource\RenderInterface;
use josegonzalez\Dotenv\Loader as Dotenv;
use Madapaja\TwigModule\TwigModule;
use Madapaja\TwigModule\TwigRenderer;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::load([
            'filepath' => dirname(dirname(__DIR__)) . '/.env',
            'toEnv' => true
        ]);
        // RenderInterface のバインド先が JsonRenderer に設定される
        $this->install(new PackageModule);

        // JSONデータ内埋め込みHTMLビューのためにTwigModuleをインストールする
        // （※同一のバインドがあれば先にされた方が優先されるので RenderInterface はまだ JsonRenderer のまま）
        $this->install(new TwigModule);
        // 新たなバインドを追加する
        $this->bind(RenderInterface::class)->annotatedWith('html')->to(TwigRenderer::class);
    }
}
