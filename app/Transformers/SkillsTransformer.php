<?php 

namespace App\Transformers;

class SkillsTransformer extends Transformer{

    /**
     * Transforms a single 
     * @param  [type] $skill [description]
     * @return [type]      [description]
     */
    public function transform($skill){

        return [
            'name' => $skill['name']
        ];
    }
}