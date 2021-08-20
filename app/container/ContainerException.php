<?php

/**
 * Verixon - A PHP Framework For Web Devs
 *
 * @package  Verixon
 * @author   Silas Udofia <Silas@Verixon.com>
*/

namespace App\container;

use Psr\Container\ContainerExceptionInterface;

/**
 * Class ContainerException
 * @package DevCoder\DependencyInjection\Exception
 */
class ContainerException extends \Exception implements ContainerExceptionInterface
{
}