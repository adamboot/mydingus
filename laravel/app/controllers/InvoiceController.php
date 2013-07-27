<?php

class InvoiceController extends \BaseController {

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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clients = Client::select('id', 'name')->where('user_id', '=', Auth::user()->id)->get();
		$data['clients'][0] = '-- select a client --';
		foreach ($clients as $client) {
			$data['clients'][$client->id] = $client->name;
		}

		$this->layout->content = View::make('dashboard.invoice.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$invoice = new Invoice;
		Input::flash();
		$input = Input::all();

		$rules = array(
			'client_id' => 'required|integer|min:1',
			'date_sent' => 'required|date',
			'amount' => 'required|numeric'
		);

		$path = '';

		if($input['file']) {
			$file_name = $input['file']->getClientOriginalName();
			$input['file']->move('upload', $file_name);
			$path = 'upload/'.$file_name;
		}

		$validator = Validator::make($input, $rules);

		if($validator->passes()) {
			$invoice->client_id = $input['client_id'];
			$invoice->date_sent = $input['date_sent'];
			$invoice->amount = $input['amount'];
			$invoice->file_url = $path;
			$invoice->save();
			return Redirect::to('dashboard');
		} else {
			return Redirect::to('invoice/create')->withErrors($validator)->withInput();
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
		$clients = Client::select('id', 'name')->where('user_id', '=', Auth::user()->id)->get();
		$data['clients'][0] = '-- select a client --';
		foreach ($clients as $client) {
			$data['clients'][$client->id] = $client->name;
		}
		$data['invoice'] = Invoice::find($id);
		$this->layout->content = View::make('dashboard.invoice.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$invoice = new Invoice;
		Input::flash();
		$input = Input::all();
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

	/**
	 * Mark the invoice as paid.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function mark_paid($id)
	{
		$invoice = new Invoice;
		$invoice::where('id', '=', $id)->update(array('is_paid' => 1));
		return Redirect::action('DashboardController@index');
	}

}