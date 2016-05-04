<?php

use Carbon\Carbon;

class Post extends BaseModel {

    protected $table = 'posts';

    public static $rules = array(
	    'title'      => 'required|max:100',
	    'body'       => 'required'
	);

    /**
    * Relationship for each post belonging to one user
    */
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function setBodyAttribute($value)
    {
        $formatted_body = '<p>' . $value . '</p>';

        $formatted_body = preg_replace("/[\r\n]+/", "\n", $formatted_body);

        $formatted_body = preg_replace("/(\n)/", "</p><p>", $formatted_body);

        $this->attributes['formatted_body'] = $formatted_body;
        $this->attributes['body'] = $value;
    }

    public static function findBySearch()
    {
        $search = Input::get('search');

        if (is_null($search))
        {

            return Post::with('user')->orderBy('created_at', 'desc')->paginate(4);
        }

        return Post::with('user')->where('title', 'LIKE', "%$search%")->orWhere('body', 'LIKE', "%$search%")->orderBy('created_at', 'desc')->paginate(4);
    }
}

?>