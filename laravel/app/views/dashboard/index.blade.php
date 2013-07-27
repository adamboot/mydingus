@extends('template')

@section('title')
My Dingus Dashboard
@stop

@section('content')

<div class="row">
	<h3 class="pull-left">Outstanding Invoices</h3>
	<a href="invoice/create" class="btn pull-right"><i class="icon-plus-sign"></i>&nbsp;New Invoice</a>
</div>

<div class="row">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Client</th>
				<th width="80">Sent On</th>
				<th width="140">Days Since Invoiced</th>
				<th>Amount</th>
				<th width="40">File</th>
				<th style="text-align: center;" width="40">Edit</th>
				<th style="text-align: center;" width="60">Delete</th>
				<th style="text-align: center;" width="90">Mark Paid</th>
			</tr>
		</thead>

		<tbody>

	@foreach ($outstanding_rows as $row)
		<tr>
			<td>{{ $row->client_name }}</td>
			<td>{{ $row->sent_on }}</td>
			<td>{{ $row->days_passed }}</td>
			<td>{{ $row->amount }}</td>
			<td><a href="{{ $row->file_url }}"><img src="{{ URL::asset('img/file-icon.png') }}" /></a></td>
	 		<td style="text-align: center;"><a href="{{ URL::to('invoice/edit', array($row->id)) }}">edit</a></td>
			<td style="text-align: center;"><a href="{{ URL::to('invoice/delete', array($row->id)) }}">delete</a></td>
			<td><a href="{{ URL::to('invoice/mark_paid', array($row->id)) }}" class="btn">Mark Paid</a></td>
		</tr>
	@endforeach
		</tbody>
	</table>

</div>



	<div class="clearfix"></div>

@stop