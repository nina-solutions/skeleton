<?php

namespace FairHub\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Support\Arrayable as Arrayable;

class ResponseMacroProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('xml', function ($data, $status = '200', $header = ['Content-Type' => 'text/xml'], $rootElement = 'response', $xml = null) use ($factory) {
            if (is_object($data) && $data instanceof Arrayable) {
                $data = $data->toArray();
            }

            if (is_null($xml)) {
                $xml = new \SimpleXMLElement('<' . $rootElement . '/>');
            }
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    if (is_numeric($key)) {
                        response()->xml($value, $status, $header, $rootElement, $xml->addChild(str_singular($xml->getName())));
                    } else {
                        response()->xml($value, $status, $header, $rootElement, $xml->addChild($key));
                    }
                } else {
                    $xml->addChild($key, $value);
                }
            }
            if (empty($header)) {
                $header['Content-Type'] = 'application/xml';
            }

            $response = $factory->make($xml->asXML(), $status);
            foreach($header as $key => $val){
                $response->header($key, $val);
            }
            return $response;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
