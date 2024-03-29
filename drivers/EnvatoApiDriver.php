<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\EnvatoApi\Drivers;

use Arikaim\Core\Arikaim;
use Arikaim\Modules\Api\AbstractApiClient;
use Arikaim\Modules\Api\Interfaces\ApiClientInterface;
use Arikaim\Core\Driver\Traits\Driver;
use Arikaim\Core\Interfaces\Driver\DriverInterface;

/**
 * Envato api driver class
 */
class EnvatoApiDriver extends AbstractApiClient implements DriverInterface, ApiClientInterface
{   
    use Driver;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDriverParams('envato','api','EnvatoApiDriver','Envato Api driver');      
    }

    /**
     * Initialize driver
     *
     * @return void
     */
    public function initDriver($properties)
    {
        $this->setBaseUrl($properties->getValue('baseUrl'));    
        $this->setOauthToken($properties->getValue('token')); 
        $this->setFunctionsNamespace('Arikaim\\Modules\\EnvatoApi\\Functions\\');       
    }

    /**
     * Get authorization header or false if api not uses header for auth
     *
     * @param array|null $params
     * @return array|null
    */
    public function getAuthHeaders(?array $params = null): ?array
    {
        return [
            'Authorization: Bearer ' . $this->oauthToken
        ];
    }

    /**
     * Get error
     *
     * @param mixed $response
     * @return string|null
     */
    public function getError($response): ?string
    {
        if (\is_array($response) == true) {
            return $response['error'] ?? null;
        }

        return null;
    }

    /**
     * Create driver config properties array
     *
     * @param Arikaim\Core\Collection\Properties $properties
     * @return array
     */
    public function createDriverConfig($properties)
    {
        $properties->property('baseUrl',function($property) {
            $property
                ->title('Base Url')
                ->type('text')
                ->default('https://api.envato.com/')
                ->value('https://api.envato.com/')
                ->readonly(true);              
        }); 
        
        $properties->property('token',function($property) {
            $property
                ->title('Personal Token')
                ->type('text')   
                ->required(true)           
                ->value('');                         
        }); 

        $properties->property('username',function($property) {
            $property
                ->title('Author username')
                ->type('text')              
                ->value('');                         
        }); 
    }
}
