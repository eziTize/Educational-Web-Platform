<?php

namespace App\Traits;

use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Manager;

trait WebTransformerTrait
{   
     /**
     * Make a resource out of the data and rrutn item
     * @param Illuminate\Database\Eloquent\Model
     * @param array $includes
     * 
     * @return array $result
     */
    public function transformerItem($model,$transformer,$includes=array()){
        $fractal = new Manager();
        if(count($includes)>0){
            $fractal->parseIncludes($includes);
        }
        $fractal->setSerializer(new ArraySerializer());

        // Make a resource out of the data and
        $resource = new Item($model,$transformer);

        // Run all transformers
        $result = $fractal->createData($resource)->toArray();
        return $result;
    }


    /**
     * Make a resource out of the data and rrutn item
     * @param Illuminate\Database\Eloquent\Model
     * @param array $includes
     * 
     * @return array $result
     */
    public function transformerCollection($model,$transformer,$includes=array()){
        $fractal = new Manager();
        if(count($includes)>0){
            $fractal->parseIncludes($includes);
        }
        $fractal->setSerializer(new ArraySerializer());

        // Make a resource out of the data and
        $resource = new Collection($model,$transformer);

        // Run all transformers
        $result = $fractal->createData($resource)->toArray();
        return $result;
    }
}
