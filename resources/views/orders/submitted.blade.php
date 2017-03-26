@extends('layouts.master')


@section('title')
    Bill Splitter
@endsection


@push('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')

	    <div class="container">
		{!!Form::open(['url'=>'/submitted','method'=>'GET','class'=>'form-horizantal'])!!}
			<div class="form-group">
			{!!Form::label('numberOfPeople','Number Of People:')!!}
			{!!Form::number('numberOfPeople',$numberOfPeople,['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
			{!!Form::label('totalWithoutTip','Total Without Tip:')!!}
			{!!Form::number('totalWithoutTip',$totalWithoutTip,['class'=>'form-control', 'step' => 'any'])!!}
			</div>

			<div class="form-group">

			{!!Form::label('round','RoundTotal:')!!}

			{!!Form::checkbox('round','true',($isRound)?'CHECKED':'',['class'=>'checkbox checkbox-primary form-control'])!!}

			</div>


			<div class="form-group">
			{!!Form::label('service','Service:')!!}
			{!!Form::select('service', array('E' => 'Excellent', 'G' => 'Good', 'P' => 'Poor'),'E',['class'=>'selectpicker form-control'])!!}
			</div>

			<div class="form-group">
			{!!Form::submit('Calculate Total',['class'=>'btn btn-primary form-control'])!!}
			</div>

		{!!Form::close()!!}
		@if(count($errors) > 0)
        <ul>
           @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
           @endforeach
        </ul>
        @endif
		<div class="alert alert-info">

                <h3>{{ $valueForEach }}</h3>

        </div>
		</div>


@endsection


@push('body')
    <script src="/js/books/show.js"></script>
@endpush
