@extends('master')
@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Login Page<!-- ['url' => 'users/register', 'method' => 'post']--></div>
            <div class="quote">
            {!! Form::open(['action' => 'User@login_process']) !!}
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td width="19%">Email:</td>
                    <td width="81%"><input type="email" required="required" name="email" id="email" /></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td><input type="password" required="required" name="password" id="password" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="button" id="button" value="Submit" /></td>
                  </tr>
                </table>
              {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection