@extends('dashboard')
@section('main')

<?php 
$individual= User::find(Auth::user()->id); 

//$individual=Individual::account()->find($account->id); 
?>
<h1 class="page-title"<i class="icon-th-large"></i>User Account</h1>		

<div class="widget-header">
<h3>Basic Information </h3>
</div>
<?php
//checking if link is comming from changing password route
if(isset($_GET['password'])){
?>

<script type="text/javascript">
 $(document).ready(function(){
 	$("#myTab a:last").tab("show");
 })

</script>
<?php
}
?>
<div class="widget-content">
<div class="bs-docs-example">
<ul id="myTab" class="nav nav-tabs">
<li id='prof' class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
<li id='pass'><a href="#password" data-toggle="tab">Change Password</a></li>              
</ul>
<div id="myTabContent" class="tab-content">
<div class="tab-pane fade in active" id="profile">
@if(Session::has('message'))
			<div class="alert alert-success" style="text-align: center">{{Session::get('message')}}</div>
			@endif
<form id="edit-profile" method ="POST" enctype="multipart/form-data" action="{{URL::to('reception/profile/'. Auth::user()->id)}}">
<fieldset>
<div class="span2">
	@if($individual->profile_pic=="")
	{{HTML::image("http://placehold.it/120x100","", array('class'=>'img-rounded'))}}
	@else
	{{HTML::image("uploads/profiles/{$individual->profile_pic}","",array('class'=>'img-rounded thumbnail', 'style'=>'height:120px;width:100px'))}}
	@endif	
	<?php echo "  " . $individual->username ?>
</div>
<div class="span6 pull-right">
<div class="control-group">											
<label class="control-label" for="username">Username</label>
<div class="controls">
<input type="text" class="input-xlarge" id="username" name= "username"value="{{ $individual->username }}" >
</div>			
</div>													

<div class="control-group">											
<label class="control-label" for="firstname" >First Name</label>
<div class="controls">
<input type="text" class="input-xlarge" id="firstname" name="firstname" value="{{ $individual->first_name }}">
</div> <!-- /controls -->				
</div> <!-- /control-group -->

<div class="control-group">											
<label class="control-label" for="firstname">Middle Name</label>
<div class="controls">
<input type="text" class="input-xlarge" id="firstname" name ="middlename"value="{{ $individual->middle_name }}">
</div> <!-- /controls -->				
</div> <!-- /control-group -->

<div class="control-group">											
<label class="control-label" for="lastname">Last Name</label>
<div class="controls">
<input type="text" class="input-xlarge" id="lastname" name = "lastname"value="{{ $individual->last_name }}">
</div> <!-- /controls -->				
</div>
<br> <!-- /control-group -->
<div style="position:relative;">
	Image{{Form::file('img',array('class'=>'')) }}
</div>
<br>
<div class="control-group">	
<div class="controls">
<button type="submit" class="btn">Update</button>
</div> <!-- /controls -->				
</div>
</div>
 <!-- /control-group -->
</fieldset>
</form>
</div>
<div class="tab-pane fade" id="password">
@if(Session::has('message'))
			<div class="alert alert-success" style="text-align: center">{{Session::get('message')}}</div>
			@endif
<form class="form-horizontal" id="password_form" action="{{URL::to('reception/profile/password/'. Auth::user()->id)}}" method="POST">
<div class="span4 pull-left">
<div class="control-group">											
<label class="control-label" for="password1">Current Password*</label>
<div class="controls">
<input type="password" class="input-xlarge" id="password1" name = "Old_password" value="">
@if($errors->has('Old_password'))
{{$errors->first('Old_password')}}
@endif
</div> <!-- /controls -->				
</div> <!-- /control-group -->
<div class="control-group">											
<label class="control-label" for="password1">New Password*</label>
<div class="controls">
<input type="password" class="input-xlarge" id="password1" name = "New_password" value="">
@if($errors->has('New_password'))
{{$errors->first('New_password')}}
@endif
</div> <!-- /controls -->				
</div> <!-- /control-group -->
<div class="control-group">											
<label class="control-label" for="password2">Confirm Password*</label>
<div class="controls">
<input type="password" class="input-xlarge" id="password2" name = "Confirm_password" value="">
@if($errors->has('Confirm_password'))
{{$errors->first('confirm_password')}}
@endif
</div> <!-- /controls -->				
</div>
<div class="controls">
<button type="reset" class="btn">Cancel</button>
<button type="submit" class="btn btn-primary">Reset</button>
</div> 
</div>
</form>
</div>

</div>
</div>
</div>


@stop