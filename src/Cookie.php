<?php

/**
 * Cookie Api
 * 
 * This a light and simple cookie class
 * 
 * @link www.omerfd.com
 * @since 1.0.0
 * 
 * @version 1.0.0
 * 
 * @package Omerfdmrl/Cookie
 * 
 * @licanse The MIT License (MIT) - Copyright (c) - http://opensource.org/licenses/MIT
 */

namespace Omerfdmrl\Cookie;

use DateTime;

class Cookie
{

    /**
     * @var string|int|null $prefix Cookie Prefix
     */
    public static string|int|null $prefix = '';

    /**
     * @var bool $onlyHttps Only Work On Https Setting
     */
    public static bool $onlyHttp = False;

    /**
     * @var string $path Cookie Path
     */
    public static string $path = '';

    /**
     * @var string $domain Cookie Domain
     */
    public static string $domain = '';

    /**
     * @var bool $secure Cookie Secure
     */
    public static bool $secure = False;

    /**
     * Set Cookie Prefix
     * 
     * @param string|int $prefix
     */
    public static function set_prefix(string|int $prefix) : void
    {
        self::$prefix = $prefix;
    }

    /**
     * @param bool $onlyHttps
     */
    public static function set_onlyHttp(bool $onlyHttp): void
    {
        self::$onlyHttp = $onlyHttp;
    }

    /**
     * @param string $path
     */
    public static function set_path(string $path): void
    {
        self::$path = $path;
    }

    /**
     * @param string $domain
     */
    public static function set_domain(string $domain): void
    {
        self::$domain = $domain;
    }

    /**
     * @param bool $secure
     */
    public static function set_secure(bool $secure): void
    {
        self::$secure = $secure;
    }

    /**
     * Create New Cookie
     * 
     * @param string|int $name
     * @param string|int|arrray|null $value
     * @param string|int|null $time
     */
    public static function set(string|int $name, string|int|array|null $value, string|int|null $time = null): void
    {
        if(!isset($_COOKIE[self::$prefix.$name])){
            if(is_string($time)){
                (substr($time,0,1) == '+') ? null : $time = '+' . $time;
                $timestap = new DateTime();
                $timestap->modify($time);
                $time = strtotime($timestap->format('Y-m-d H:i:s'));
            }elseif(is_int($time)){
                $time = $time;
            }
            setcookie(self::$prefix.$name,$value,$time,self::$path,self::$domain,self::$secure,self::$onlyHttp);
        }
    }

    /**
     * Get Current Cookie
     * 
     * @param string|int $name
     */
    public static function get(string|int $name): bool|string|int
    {
        if(isset($_COOKIE[self::$prefix.$name])){
            return $_COOKIE[self::$prefix.$name];
        }else {
            return False;
        }
    }


    /**
     * Create Forever Cookie
     * 
     * @param string|int $name
     * @param string|int|array|null $value
     */
    public static function forever(string|int $name, string|int|array|null $value): void
    {
        self::set($name,$value,'+100 year');
    }

    /**
     * Delete Cookie
     * 
     * @param string|int $name
     */
    public static function delete(string|int $name): void
    {
        unset($_COOKIE[$name]);
    }
}
