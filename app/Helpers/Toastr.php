<?php

declare(strict_types=1);

namespace App\Helpers;

class Toastr
{
    /**
     * Toastr success
     *
     * @param string $message
     * @return void
     */
    public static function success(string $message)
    {
        return session()->flash('toastr_success', $message);
    }

    /**
     * Toastr info
     *
     * @param string $message
     * @return void
     */
    public static function info(string $message)
    {
        return session()->flash('toastr_info', $message);
    }

    /**
     * Toastr warning
     *
     * @param string $message
     * @return void
     */
    public static function warning(string $message)
    {
        return session()->flash('toastr_warning', $message);
    }

    /**
     * Toastr error
     *
     * @param string $message
     * @return void
     */
    public static function error(string $message)
    {
        return session()->flash('toastr_error', $message);
    }
}
