<?php

namespace App\Controllers\v1;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
* Exemplo de Controller da API
* @email msfidelis01@gmail.com
* @author Matheus Fidelis
*/
class serverController implements ControllerProviderInterface 
{
    
    /**
    * Connect Method
    * @param Application $app
    * @return Application
    */
    public function connect(Application $app) 
    {
        
        $server = $app['controllers_factory'];
        
        /**
         * Server - PHP Version
         */
        $server->get('/phpversion', function() use ($app) {
            return $app->json(['phpversion' => phpversion()]);
        });
        
        /**
         * Server - Hostname
         */
        $server->get('/hostname', function() use ($app) {
            return $app->json(['hostname' => gethostname()]);
        });
        
        /**
         * Server - PHPInfo
         */
        $server->get('/phpinfo', function() use ($app) {
            return new Response(phpinfo(), 200, array(
            'Cache-Control' => 's-maxage=510',
            ));
        });

        return $server;
    }
    
}