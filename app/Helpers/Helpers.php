<?php

use App\User;

/**
 * Get the route name and find that if that is matched with the current route.
 *
 * @param  string  $route
 * @param  string  $output
 * @param  boolean $class
 * @return string
 */
function isActiveRoute($route, $output = " active", $class = false)
{
    if (Route::currentRouteName() == $route) {
        return ($class == false ? $output : " class='" . $output . "'");
    }

}

/**
 * Get the route name and find that if that is matched with the current route.
 *
 * @param  array  $routes
 * @param  string  $output
 * @param  boolean $class
 * @return string
 */
function areActiveRoutes(array $routes, $output = " active", $class = false)
{
    foreach ($routes as $route) {
        if (Route::currentRouteName() == $route) {
            return ($class == false ? $output : ' class=\'' . $output . '\'');
        }

    }
}

/**
 * Get the php time and convert that to database date format.
 *
 * @param  int     $unixtime
 * @return string
 */
function TimeToDatabaseDate($unixtime = null)
{
    $unixtime == null ? $unixtime = time() : $unixtime;
    return date("Y-m-d", $unixtime);
}

/**
 * Get the number and display it as per website format.
 *
 * @param  number  $number
 * @param  number  $decimals
 * @return number
 */
function FormatNumber($number, $decimals = 0)
{
    if (is_numeric($number)) {
        return number_format($number, $decimals, ',', '.');
    } else {
        return number_format(0, $decimals, ',', '.');
    }
}

/**
 * Get the amount associated with the currency from the web config.
 *
 * @param  number  $amount
 * @return number
 */
function getWithCurrency($amount, $decimals = 0)
{
    return FormatNumber($amount, $decimals) . \Config::get('website.currency');
}

/**
 * A wrapper around base64_decode which decodes Base64URL-encoded data,
 * which is not the same alphabet as base64.
 */
function base64url_decode($base64url)
{
        return base64_decode(b64url2b64($base64url));
}

/**
 * Per RFC4648, "base64 encoding with URL-safe and filename-safe
 * alphabet".  This just replaces characters 62 and 63.  None of the
 * reference implementations seem to restore the padding if necessary,
 * but we'll do it anyway.
 *
 */
function b64url2b64($base64url)
{
    // "Shouldn't" be necessary, but why not
    $padding = strlen($base64url) % 4;
    if ($padding > 0) {
        $base64url .= str_repeat("=", 4 - $padding);
    }
    return strtr($base64url, '-_', '+/');
}

/**
 * Get the user have the permission to access the route.
 *
 * @return string $bool
 */
function getPermissionAccess(User $user, $routename)
{
    if ($user->inRole('admin') || $user->hasAccess($routename)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Generate a more truly "random" alpha-numeric string.
 *
 * @param  int  $length
 * @return string
 *
 * @throws \RuntimeException
 */
function randomString($length = 10)
{
    if (!function_exists('openssl_random_pseudo_bytes')) {
        throw new RuntimeException('OpenSSL extension is required.');
    }

    $bytes = openssl_random_pseudo_bytes($length * 2);

    if ($bytes === false) {
        throw new RuntimeException('Unable to generate random string.');
    }

    $string = strtoupper(substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length));
    return substr($string, 0, 3) . '-' . substr($string, 4, 3) . '-' . substr($string, 6, 4);
}

function formattedDate($datetime, $showCurrentYear = false)
{
    $month = getMonthName(date('m', $datetime));
    $day = date('d', $datetime);
    $year = date('Y', $datetime);
    $currentyear = date('Y');
    if ($year == $currentyear && !$showCurrentYear) {
        $year = '';
    }
    if (!empty($year)) {
        $year = ', ' . $year;
    }
    return $month . ' ' . $day . $year;
}
