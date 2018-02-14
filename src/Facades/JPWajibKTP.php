<?php namespace Bantenprov\JPWajibKTP\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The JPWajibKTP facade.
 *
 * @package Bantenprov\JPWajibKTP
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPWajibKTP extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jumlah-penduduk-wajib-ktp';
    }
}
