<?php
//NEVER USE THIS MODEL!!!!!!!!!!!
namespace FairHub\Models;
use Illuminate\Support\Facades\App;
//NEVER USE THIS MODEL!!!!!!!!!!!
class tab_lingue extends HubModel
{
    //NEVER USE THIS MODEL!!!!!!!!!!!
    protected $table = 'tab_lingue';
    public $timestamps = false;
    protected $primaryKey = 'lin_id';
    //NEVER USE THIS MODEL!!!!!!!!!!!
    /**
     * @return int
     */
    public function getIdAttribute(){
        return $this->attributes['lin_id'];
    }

    //If you hate the way this Database is designed,
    //please use this method to automagically the right translated description
    /**
     * @return string
     */
    public function getDescriptionAttribute(){
        //If english return english description
        return $this->attributes['lin_desc'];
    }

}
