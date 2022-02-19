<?php

use Illuminate\Container\Container;
use Illuminate\Events\EventServiceProvider;
use Illuminate\Routing\RoutingServiceProvider;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Fluent;
use Illuminate\View\ViewServiceProvider;
use Illuminate\Filesystem\FilesystemServiceProvider;

// composer自动加载
require_once __DIR__ . "/../vendor/autoload.php";
// 实例化服务容器
$app = new Container();
// 添加静态属性，可以从任何地方获取实例
Container::setInstance($app);
// 注册事件和路由服务提供者
(new EventServiceProvider($app))->register();
(new RoutingServiceProvider($app))->register();
// 数据库ORM模型
$capsule = new Capsule();
$capsule->addConnection(require '../config/database.php');
$capsule->bootEloquent();
// 视图配置与服务注册
$app->instance('config', new Fluent());
$app['config']['view.compiled'] = __DIR__ . '/../storage/framework/views/';
$app['config']['view.paths'] = [__DIR__.'/../resources/views/'];
(new ViewServiceProvider($app))->register();
(new FilesystemServiceProvider($app))->register();
// 加载路由
require __DIR__ . '/../routes/web.php';
// 实例化请求并分发处理请求
$request = Illuminate\Http\Request::createFromGlobals();
$reponse = $app['router']->dispatch($request);
// 返回请求响应
$reponse->send();
