<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 18-4-17
 * Time: 下午4:35
 */

namespace Core\Interfaces\Foundation;

use Core\Interfaces\Container\Container as ContainerIntface;
interface Applicaction extends ContainerIntface
{

    public function version();

    public function basePath();

    public function environment();

    public function runningInConsole();

    public function runningUnitTests();

    public function isDownForMaintenance();

    public function registerConfiguredProviders();

    public function register($provider, $options = [], $force = false);

    public function registerDeferredProvider($provider, $service = null);

    public function boot();

    public function booting($callback);

    public function booted($callback);

    public function getCachedServicesPath();

    public function getCachedPackagesPath();
}