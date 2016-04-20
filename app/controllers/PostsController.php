<?php

class PostsController extends \BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('role_type', array('except' => array('index', 'show')));
	    $this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$posts = Post::findBySearch();

		return View::make('posts.index')->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('posts/create')->with('edit', false);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$post = new Post();
		$post->user_id = Auth::id();

	    return $this->validateAndSave($post);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$post = Post::find($id);

		if (!$post)
		{

			App::abort(404);
		}

		return View::make('posts.show')->with('post', $post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$post = Post::find($id);
		return View::make('posts.create')->with(array('post' => $post, 'edit' => true));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$post = Post::find($id);

		return $this->validateAndSave($post);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$post = Post::find($id);
		$oldImage = $post->image_location;
		File::delete($oldImage);
		$post->delete();
		Session::flash('successMessage', 'Your post was deleted');
		return Redirect::action('PostsController@index');
	}

	protected function validateAndSave($post)
	{

		$validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation
	    if ($validator->fails())
	    {

	    	Session::flash('errorMessage', 'Your post was not updated');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }

	    if (isset($post->id))
	    {

    		Session::flash('successMessage', 'Your post was updated');
	    }
	    else
	    {

	    	Session::flash('successMessage', 'Your post was saved');
	    }

		$post->title = Input::get('title');

		if (Input::hasFile('image'))
		{

			$oldImage = $post->image_location;
			File::delete($oldImage);
			$imagePath = 'uploads/';
			$imageExtension = Input::file('image')->getClientOriginalExtension();
			$imageName = uniqid() . '.' . $imageExtension;
			Input::file('image')->move($imagePath, $imageName);
			$post->image_location = '/uploads/' . $imageName;
		}

		$post->body = Input::get('body');
		$post->save();

		return Redirect::action('PostsController@show', $post->id);
	}

}