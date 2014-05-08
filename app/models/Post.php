<?php

use Carbon\Carbon;

class Post extends BaseModel {

    protected $table = 'posts';

    /**
    * Relationship for each post belonging to one user
    */
    public function user() 
    {
    	return $this->belongsTo('User');
    }

    public static $rules = array(
	    'title'      => 'required|max:100',
	    'body'       => 'required|max:10000'
	);

    /**
    * Sets timezone for posts
    */
	
}

?>