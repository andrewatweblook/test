@extends('master')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Model Insert</div>
            <div class="quote">
             {!! Form::open(['action' => 'Model@model_insert_process']) !!}
              <input required="required" type="text" name="fnumber" id="fnumber" placeholder="Flight Number" />
              <input type="number" min="50" step="2" required="required" name="seats" id="seats" placeholder="Seats" />
              <input type="text" required="required" name="origin" id="origin" placeholder="Origin" />
              <input type="submit" name="button" id="button" value="Submit" />
             {!! Form::close() !!}
            </div>
        </div>
        <div class="content">
            <div class="title">Model Select</div>
            <div class="quote">
			<?php foreach ($flights as $flight) {
    				echo $flight->fid.' - '.$flight->fnumber.' - '.$flight->seats.' - '.$flight->origin.' - <a href="model_update/'.$flight->fid.'">Edit</a> | <a href="model_delete/'.$flight->fid.'">Delete</a></br>';
			} ?>
            
            </div>
        </div>
        
    </div>
@endsection