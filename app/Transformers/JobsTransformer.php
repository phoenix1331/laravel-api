<?php 

namespace App\Transformers;

class JobsTransformer extends Transformer{

    /**
     * Transforms a single 
     * @param  [type] $job [description]
     * @return [type]      [description]
     */
    public function transform($job){

        return [
            'name' => $job['name'],
            'description' => $job['description']

        ];
    }
}