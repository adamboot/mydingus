<?php

class AccountController extends \BaseController {

	protected $layout = 'template';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function login()
	{
		$input = Input::all();
		if(Auth::attempt(array('email' => $input['email'], 'password' => $input['password']))) {
			return Redirect::to('dashboard');
		}
	}

	public function logout()
	{
		Auth::logout();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('account.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Input::flash();
		$input = Input::all();

		$rules = array(
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'email' => 'required|email',
			'password' => 'required|same:password_confirm',
			'password_confirm' => 'required|same:password'
		);

		$validator = Validator::make($input, $rules);

		if($validator->passes()) {
			$user = new User;

			$array = array(
				'first_name' => $input['first_name'], 
				'last_name' => $input['last_name'], 
				'email' => $input['email'], 
				'password' => Hash::make($input['password'])
				);

			$user->create($array);
			return Redirect::to('/');
		} else {
			return Redirect::to('account/create')->withErrors($validator)->withInput();
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}