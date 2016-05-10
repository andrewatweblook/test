@extends('master')
@section('title', 'Home')

<?php
$mearray = array();
foreach($value[0] as $vals){$mearray[]=$vals;}
?>

@section('content')
<div class="container">
        <div class="content">
            <div class="title">Profile Page </div>
            <div class="quote">
            {!! Form::open(['action' => 'User@profile_process']) !!}
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td>Email:</td>
                    <td><input type="email" required="required" name="email" id="email" value="<?php echo $mearray[2];?>" readonly="readonly" /></td>
                  </tr>
                  <tr>
                    <td width="19%">Full Name:</td>
                    <td width="81%"><input required="required" type="text" name="fullname" id="fullname" value="<?php echo $mearray[1];?>" /></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td><input type="password" required="required" name="password" id="password" value="<?php echo $mearray[3];?>" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="button" id="button" value="Submit" /></td>
                  </tr>
                </table>
              {!! Form::close() !!}
              {!! Form::open(['action' => 'User@gallery_process', 'files'=>true]) !!}
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                        <td width="7%">Gallery:</td>
                        <td width="89%"><input type="file" name="fileField" id="fileField" />
                        <input type="submit" name="button2" id="button2" value="Submit" /></td>
                        <td width="4%">&nbsp;</td>
                  </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><?php
                            foreach($gals as $vals){
								$url=array();
								foreach($vals as $val){
									$url[]=$val;
								}
								?>
                                <img src="<?php echo $url['2'];?>" width="206" height="206" />
                                <?php
                            }
                            ?>
                        </td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection