<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

use Illuminate\Support\Str;
use Webmozart\PathUtil\Path as P;

if (!function_exists('is_not_null')) {
    function is_not_null($var): bool
    {
        return null !== $var;
    }
}

if (!function_exists('is_local')) {
    function is_local(): bool
    {
        return app()->isLocal();
    }
}

if (!function_exists('is_production')) {
    function is_production(): bool
    {
        return app()->environment() === 'production';
    }
}

function RGClientIP()
{
    // IP fields for aliyun slb.
    // Request::setTrustedProxies(['100.97.0.0/16']);
    // Fixed: 配置过可信任代理，这里就不需要阿里云 ip

    return request()->ip();
}

function RGUserLevel($level)
{
    return config('level.user.' . $level . '.name');
}

function RGSchoolLevel($level)
{
    return config('level.school.' . $level . '.name');
}

function RGUserLevelColor($level)
{
    $levels = config('level.user');

    return $levels[$level % count($levels)]['color'];
}

function RGSchoolLevelColor($level)
{
    $levels = config('level.school');

    return $levels[$level % count($levels)]['color'];
}

function RGSchoolLevelUpMoney($level)
{
    return config('level.school.' . ($level + 1) . '.cost');
}

function RGSchoolLevelUpLife($level)
{
    return config('level.school.' . ($level + 1) . '.life');
}

function RGResponse($message = 'ok', $option = null)
{
    return RGError(0, $message, $option);
}

function RGError($code = 0, $message = 'ok', $option = null)
{
    return (new Ruogu\Foundation\Error\Error($code, $message, $option))->show();
}

function RGException(Exception $e)
{
    return RGError($e->getCode(), $e->getMessage());
}

function RGAccepted()
{
    return response(null, 203);
}

function RGNoContent()
{
    return response(null, 204);
}

function RGImage($url, $style = null)
{
    if (null !== $style && Str::contains($url, 'o.ruogoo.cn')) {
        return str_replace('o.ruogoo.cn', 'i.ruogoo.cn', $url) . '@!' . $style;
    }

    return $url;
}

function rg_closure($closure): bool
{
    if ($closure instanceof Closure) {
        $closure();

        return true;
    }

    return false;
}

function rg_ruogu_path($path = ''): string
{
    return base_path('ruogu') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
}

function user_event(string $eventName, array $properties = [])
{
    $event = \Ruogu\Business\UserEvent\UserEvent::type($eventName);
    foreach ($properties as $property => $value) {
        $event->with($property, $value);
    }
    $event->fire();
}

/**
 * @param      $var
 * @param null $property
 * @return bool|mixed
 */
function invert(&$var, $property = null)
{
    if (null === $property) {
        $var = !$var;
    } else {
        $var->$property = !$var->$property;
    }

    return $var;
}

/**
 * @param $var
 * @return bool
 */
function RGNull($var)
{
    return null === $var;
}

/**
 * @param $var
 * @return bool
 */
function RGNotNull($var)
{
    return null !== $var;
}

/**
 * @param $closure
 * @return bool
 */
function RGClosure($closure): bool
{
    if ($closure instanceof Closure) {
        $closure();

        return true;
    }

    return false;
}

/**
 * @param      $var
 * @param null $property
 * @return bool
 */
function RGInvert(&$var, $property = null)
{
    if (null === $property) {
        $var = !$var;
    } else {
        $var->$property = !$var->$property;
    }

    return $var;
}

function RGCdn($filePath)
{
    if ($cdn = config('app.cdn')) {
        return $cdn . P::makeAbsolute($filePath, '/');
    }

    return P::makeAbsolute($filePath, '/');
}

function RGRoute(string $name, $parameters = []): string
{
    if (!\Illuminate\Support\Facades\Route::has($name)) {
        return '';
    }
    $url = route($name, $parameters, true);

    if (app()->environment() === 'production') {
        return str_replace('http://', 'https://', $url);
    }

    return $url;
}

function RGDomain($subDomain = null)
{
    if (app()->environment() === 'test') {
        return null;
    }

    $mainDomain = config('app.domain');
    if (null === $subDomain) {
        return $mainDomain;
    }

    return $subDomain . '.' . $mainDomain;
}

/**
 * @param \Closure      $closure
 * @param \Closure|null $exceptionHandler
 * @return mixed
 * @throws \Exception
 */
function RGTransaction(Closure $closure, $exceptionHandler = null)
{
    try {
        return \Illuminate\Support\Facades\DB::transaction($closure);
    } catch (Exception $e) {
        if ($exceptionHandler instanceof Closure) {
            $exceptionHandler($e);
        } else {
            throw $e;
        }
    }
}

function RGElixir($file, $baseDir = null)
{
    $manifest = json_decode(file_get_contents('/' . P::join(public_path(), $baseDir, 'rev-manifest.json')), true);

    if (isset($manifest[$file])) {
        return P::join($baseDir, $manifest[$file]);
    }

    throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
}

function RGMix($file, $manifestDirectory = ''): string
{
    return mix($file, $manifestDirectory)->toHtml();
}

if (!function_exists('hashid_encode')) {
    function hashid_encode($id)
    {
        return \Vinkla\Hashids\Facades\Hashids::encode($id);
    }
}

if (!function_exists('hashid_decode')) {
    function hashid_decode($hashedId)
    {
        return \Vinkla\Hashids\Facades\Hashids::decode($hashedId);
    }
}
