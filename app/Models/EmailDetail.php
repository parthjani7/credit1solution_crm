<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailDetail extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $fillable = [ 'to_from' , 'type','subject','message','include_data'];

}
