@extends('template')

@section('title')
MyDingus - New Invoice
@stop

@section('content')

{{ Form::open(array('action' => 'InvoiceController@store', 'id' => 'create_invoice_form', 'files' => true))}}

{{ Form::label('client_id', 'For Client:') }}
{{ Form::select('client_id', $clients) }}
<span class="text-error">{{ $errors->first('client_id') }}</span>

{{ Form::label('date_sent', 'Date Sent:') }}
{{ Form::text('date_sent') }}
<span class="text-error">{{ $errors->first('date_field') }}</span>

{{ Form::label('amount', 'Amount:') }}
{{ Form::text('amount') }}
<span class="text-error">{{ $errors->first('amount') }}</span>

{{ Form::label('file', 'Attach a File:') }}
{{ Form::file('file') }}
<span class="text-error">{{ $errors->first('file') }}</span>

{{ Form::label('') }}

{{ Form::submit('Submit', array('class' => 'btn')) }}

{{ Form::close() }}

@stop