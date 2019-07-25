<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeExtensions();
    }

    protected function registerBladeExtensions()
    {
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $bladeCompiler->directive('permission', function ($arguments) {
                list($data, $guard) = explode(',', $arguments . ',');
                $permission = is_array($data) ? $data : explode('|', trim(str_replace(["'", '"'], "", $data)));

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasPermissionTo(" . json_encode($permission) . ")): ?>";
            });
            $bladeCompiler->directive('elsepermission', function ($arguments) {
                list($data, $guard) = explode(',', $arguments . ',');
                $permission = is_array($data) ? $data : explode('|', trim(str_replace(["'", '"'], "", $data)));

                return "<?php elseif(auth({$guard})->check() && auth({$guard})->user()->hasPermissionTo(" . json_encode($permission) . ")): ?>";
            });
            $bladeCompiler->directive('endpermission', function () {
                return '<?php endif; ?>';
            });

            $bladeCompiler->directive('haspermission', function ($arguments) {
                list($data, $guard) = explode(',', $arguments . ',');
                $permission = is_array($data) ? $data : explode('|', trim(str_replace(["'", '"'], "", $data)));

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasPermissionTo(" . json_encode($permission) . ")): ?>";
            });
            $bladeCompiler->directive('endhaspermission', function () {
                return '<?php endif; ?>';
            });

            $bladeCompiler->directive('hasanypermission', function ($arguments) {
                list($data, $guard) = explode(',', $arguments . ',');
                $permissions = is_array($data) ? $data : array_values(explode('|', trim(str_replace(["'", '"'], "", $data))));

                return "<?php if(auth()->check() && auth({$guard})->user()->hasAnyPermission(" . json_encode($permissions) . ")): ?>";
            });
            $bladeCompiler->directive('endhasanypermission', function () {
                return '<?php endif; ?>';
            });

            $bladeCompiler->directive('hasallpermissions', function ($arguments) {
                list($data, $guard) = explode(',', $arguments . ',');
                $permissions = is_array($data) ? $data : explode('|', trim(str_replace(["'", '"'], "", $data)));

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasAllPermissions(" . json_encode($permissions) . ")): ?>";
            });
            $bladeCompiler->directive('endhasallpermissions', function () {
                return '<?php endif; ?>';
            });

            $bladeCompiler->directive('unlesspermission', function ($arguments) {
                list($data, $guard) = explode(',', $arguments . ',');
                $permission = is_array($data) ? $data : explode('|', trim(str_replace(["'", '"'], "", $data)));

                return "<?php if(!auth({$guard})->check() || ! auth({$guard})->user()->hasPermissionTo(" . json_encode($permission) . ")): ?>";
            });
            $bladeCompiler->directive('endunlesspermission', function () {
                return '<?php endif; ?>';
            });
        });
    }
}
