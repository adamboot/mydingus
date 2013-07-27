<?php

class DashboardController extends \BaseController {

	protected $layout = 'template';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$invoice = new Invoice;
		$data['outstanding_rows'] = $invoice::whereNested(function($query){
			$query->where('users.id', '=', Auth::user()->id);
			$query->where('invoices.is_paid', '=', 0);
		})
		->join('clients', 'clients.id', '=', 'invoices.client_id')
		->join('users', 'users.id', '=', 'clients.user_id')
		->select(
			"clients.name as client_name", 
			DB::raw("DATE_FORMAT(invoices.date_sent, '%m/%d/%Y') as 'sent_on'"),
			DB::raw("DATEDIFF(CURDATE(), invoices.date_sent) as 'days_passed'"),
			DB::raw("CONCAT('$', FORMAT(invoices.amount, 2)) as 'amount'"),
			"invoices.file_url",
			"invoices.id"
			)
		->get();

		$this->layout->content = View::make('dashboard.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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