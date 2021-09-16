<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\EnvatoApi;

use Arikaim\Core\Extension\Module;

/**
 * Envato Api client module class
 */
class EnvatoApi extends Module
{
    /**
     * Install module
     *
     * @return void
     */
    public function install()
    {
        $this->installDriver('Arikaim\\Modules\\EnvatoApi\\Drivers\\EnvatoApiDriver');
    }
}
