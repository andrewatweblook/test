@extends('master')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Model Update</div>
            <div class="quote">
			{!! Form::open(['action' => 'Model@model_update_process']) !!}
              <input required="required" type="text" name="fnumber" id="fnumber" value="<?php echo $flight->fnumber; ?>" placeholder="Flight Number" />
              <input type="number" min="50" step="2" required="required" name="seats" id="seats" placeholder="Seats" value="<?php echo $flight->seats; ?>" />
              <input type="text" required="required" name="origin" id="origin" placeholder="Origin" value="<?php echo $flight->origin; ?>" />
              <input type="hidden" value="<?php echo $flight->fid; ?>" name="fid" />
              <input type="submit" name="button" id="button" value="Submit" />
             {!! Form::close() !!}
			</div>
        </div>
    </div>
@endsection