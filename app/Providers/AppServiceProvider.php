<?php namespace App\Providers;

use Barryvdh\Debugbar\ServiceProvider as DebugBarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use Laracasts\Generators\GeneratorsServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * アプリケーションサービスの初期化処理
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * アプリケーションサービスの登録
     *
     * このサービスプロバイダーは、アプリケーションの様々な
     * コンテナ結合を行うのに最適です。ご覧の通り、"Registrar"実装を
     * ここで登録しています。皆さんの結合も追加できますよ！
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'App\Services\Registrar'
        );
        if ($this->app->environment('local')) {
            $this->app->register(IdeHelperServiceProvider::class);
            $this->app->register(GeneratorsServiceProvider::class);
            $this->app->register(DebugBarServiceProvider::class);
        }
    }

}
