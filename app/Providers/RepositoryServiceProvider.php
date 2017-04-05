<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Ilongx\Repositories\MenuRepository;
use Ilongx\Repositories\PermissionRoleRepository;
use Ilongx\Repositories\PermissionRepository;
use Ilongx\Repositories\AdminUserRoleRepository;
use Ilongx\Repositories\MenuRoleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMenuRepository();
        $this->registerPermissionRoleRepository();
        $this->registerAdminUserRoleRepository();
        $this->registerPermissionRepository();
        $this->registerMenuRoleRepository();
    }

    public function registerMenuRepository()
    {
        $this->app->singleton('MenuRepository', function($app) {
            $model = 'App\Models\Menu';
            $menu = new $model();
            $validator = $app['validator'];
            return new MenuRepository($menu, $validator);
        });
        $this->app->alias('MenuRepository', MenuRepository::class);
    }

    public function registerPermissionRoleRepository()
    {
        $this->app->singleton('PermissionRoleRepository', function($app) {
            $model = 'App\Models\PermissionRole';
            $menu = new $model();
            $validator = $app['validator'];
            return new PermissionRoleRepository($menu, $validator);
        });
        $this->app->alias('PermissionRoleRepository', PermissionRoleRepository::class);
    }

    public function registerAdminUserRoleRepository()
    {
        $this->app->singleton('AdminUserRoleRepository', function($app) {
            $model = 'App\Models\AdminUserRole';
            $menu = new $model();
            $validator = $app['validator'];
            return new AdminUserRoleRepository($menu, $validator);
        });
        $this->app->alias('AdminUserRoleRepository', AdminUserRoleRepository::class);
    }

    public function registerPermissionRepository()
    {
        $this->app->singleton('PermissionRepository', function($app) {
            $model = 'App\Models\Permission';
            $menu = new $model();
            $validator = $app['validator'];
            return new PermissionRepository($menu, $validator);
        });
        $this->app->alias('PermissionRepository', PermissionRepository::class);
    }

    public function registerMenuRoleRepository()
    {
        $this->app->singleton('MenuRoleRepository', function($app) {
            $model = 'App\Models\MenuRole';
            $menu = new $model();
            $validator = $app['validator'];
            return new MenuRoleRepository($menu, $validator);
        });
        $this->app->alias('MenuRoleRepository', MenuRoleRepository::class);
    }
}
