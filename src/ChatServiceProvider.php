<?php

namespace Khall\Chat;

use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes(
            [
            \dirname(__DIR__) . '/config/khall_chat.php' => config_path('khall_chat.php'),
            ]
        );
        $times = date('Y_m_d_His');
        $path = '/database/migrations/2019_06_10_010101_create_message_table.php';
        $this->publishes(
            [
                \dirname(__DIR__) . $path=> database_path('migrations/' . $times . '_create_message_table.php'),
            ]
        );

        $this->loadViewsFrom(\dirname(__DIR__) . '/views', 'chat');
        $this->publishes(
            [
            \dirname(__DIR__) . '/views' => resource_path('views/vendor/chat'),
            ]
        );
    }

    public function register()
    {
        parent::register(); // TODO: Change the autogenerated stub

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $path = '/database/migrations/2019_06_10_010101_create_message_table.php';
        $this->loadMigrationsFrom(\dirname(__DIR__) . $path);
    }
}
