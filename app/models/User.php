<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public static $rules = array(
	    'email'      => 'required|max:200',
	    'password'       => 'required|max:100'
	);

	public static $createRules = array(
		'email'      => 'required|unique:users|max:200',
	    'password'       => 'max:100',
	    'username'       => 'required|max:100',
	    'first_name'       => 'required|max:100',
	    'last_name'       => 'required|max:100'
	);

	/**
	* Relationship for each user has many posts
	*/
	public function posts() 
	{
		return $this->hasMany('Posts');
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	public function setPasswordAttribute($value) 
	{
		$this->attributes['password'] = Hash::make($value);
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}