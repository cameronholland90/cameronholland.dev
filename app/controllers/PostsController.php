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
		$search = Input::get('search');
		if (is_null($search)) {
			$data = Post::with('User')->orderBy('created_at', 'desc')->paginate(4);
		} else {
			$data = Post::with('User')->where('title', 'LIKE', "%$search%")->orWhere('body', 'LIKE', "%$search%")->orderBy('created_at', 'desc')->paginate(4);
		}
		return View::make('posts.index')->with('posts', $data);
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

	    // create the validator
	    $validator = Validator::make(Input::all(), Post::$rules);
	    Log::info(Input::all());

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorMessage', 'Your post was not saved');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	    else
	    {
	        // validation succeeded, create and save the post
	        Session::flash('successMessage', 'Your post was saved');
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			if (Input::hasFile('image')) {
				$imagePath = 'uploads/';
				$imageExtension = Input::file('image')->getClientOriginalExtension();
				$imageName = uniqid() . '.' . $imageExtension;
				Input::file('image')->move($imagePath, $imageName);
				$post->image_location = 'uploads/' . $imageName;
			}
			$post->user_id = Auth::user()->id;
			$post->save();
			return View::make('posts.show')->with('post', $post);
	    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Post::find($id);
		return View::make('posts.show')->with('post', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Post::find($id);
		return View::make('posts.create')->with(array('post' => $data, 'edit' => true));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);

	    // attempt validation
	    if ($validator->fails())
	    {
	    	Session::flash('errorMessage', 'Your post was not updated');
	        // validation failed, redirect to the post create page with validation errors and old inputs
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	    else
	    {
	    	Session::flash('successMessage', 'Your post was updated');
	        // validation succeeded, create and save the post
	        $post = Post::find($id);
			$post->title = Input::get('title');
			if (Input::hasFile('image')) {
				$oldImage = $post->image_location;
				File::delete($oldImage);
				$imagePath = 'uploads/';
				$imageExtension = Input::file('image')->getClientOriginalExtension();
				$imageName = uniqid() . '.' . $imageExtension;
				Input::file('image')->move($imagePath, $imageName);
				$post->image_location = 'uploads/' . $imageName;
			}
			$post->body = Input::get('body');
			$post->save();
			return View::make('posts.show')->with('post', $post);
	    }
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

}