<?php

namespace FairHub\Providers;

use FairHub\Http\Requests\Request;
use Illuminate\Database\Eloquent\Collection;
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
        $factory->macro('xml', function ($data, $status = '200', $header = ['Content-Type' => 'text/xml'], $rootElement = 'responses', $xml = null) use ($factory) {
            //define a new root name if we have one
            if ($data instanceof Collection) {
                $rootElement = class_basename($data->first()->getTable());
            }

            //xml startup
            if (is_null($xml)) {
                $xml = new \SimpleXMLElement('<' . $rootElement . '/>');
            }

            //obj to array
            if (is_object($data) && $data instanceof Arrayable) {
                $data = $data->toArray();
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

            $response = $factory->make($xml->asXML(), $status);
            foreach($header as $key => $val){
                $response->header($key, $val);
            }
            return $response;
        });

        $factory->macro('rss', function ($data, $status = '200', $header = ['Content-Type' => 'text/rss+xml'], $rootElement = 'channel', $xml = null) use ($factory) {
            //xml startup
            if (is_null($xml)) {
                $xml = new \SimpleXMLElement('<rss version="2.0"/>');
                $channel = $xml->addChild('channel');
                if ($data instanceof Collection) {
                    $table = $data->first()->getTable();
                    $channel->addChild('title', config('hub-contents.' . $table . '.rss.title'));
                    $channel->addChild('link', request()->url());
                    $channel->addChild('atom:link')->addAttribute('rel', 'self');
                    $channel->addChild('description', config('hub-contents.' . $table . '.rss.description'));
                }
            }else{
                $channel = $xml;
            }

            //obj to array
            if (is_object($data) && $data instanceof Arrayable) {
                $data = $data->toArray();
            }
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    if (is_numeric($key)) {
                        response()->rss($value, $status, $header, $rootElement, $channel->addChild('item'));
                    } else {
                        if($key === 'content'){
                            $channel->addChild('description', $value['description']);
                            $channel->addChild('description', $value['description']);
                        }else
                            response()->rss($value, $status, $header, $rootElement, $channel->addChild($key));
                    }
                } else {
                    switch($key){
                        case 'title':
                        case 'link':
                            $channel->addChild($key, $value);
                            break;
                        case 'id':
                            $channel->addChild('guid', request()->url() . $value)->addAttribute('isPermaLink', 'false');
                            break;
                        case 'updated_at':
                            ///$channel->addChild('pubDate', $value);
                            break;

                    }
                    //$channel->addChild($key, $value);
                }
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
