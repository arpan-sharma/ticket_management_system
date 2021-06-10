@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
Tickect Management | Admin
@stop
@section('header_styles')

<style type="text/css">
    .switch {
      position: relative;
      display: block;
      vertical-align: top;
      width: 100px;
      height: 30px;
      padding: 3px;
      margin: 0 10px 10px 0;
      background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
      background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
      border-radius: 18px;
      box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
      cursor: pointer;
  }
  .switch-input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
  }
  .switch-label {
      position: relative;
      display: block;
      height: inherit;
      font-size: 10px;
      text-transform: uppercase;
      background: #eceeef;
      border-radius: inherit;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
  }
  .switch-label:before, .switch-label:after {
      position: absolute;
      top: 50%;
      margin-top: -.5em;
      line-height: 1;
      -webkit-transition: inherit;
      -moz-transition: inherit;
      -o-transition: inherit;
      transition: inherit;
  }
  .switch-label:before {
      content: attr(data-off);
      right: 11px;
      color: #aaaaaa;
      text-shadow: 0 1px rgba(255, 255, 255, 0.5);
  }
  .switch-label:after {
      content: attr(data-on);
      left: 11px;
      color: #FFFFFF;
      text-shadow: 0 1px rgba(0, 0, 0, 0.2);
      opacity: 0;
  }
  .switch-input:checked ~ .switch-label {
      background: #0088cc;
      border-color: #0088cc;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
  }
  .switch-input:checked ~ .switch-label:before {
      opacity: 0;
  }
  .switch-input:checked ~ .switch-label:after {
      opacity: 1;
  }
  .switch-handle {
      position: absolute;
      top: 4px;
      left: 4px;
      width: 28px;
      height: 28px;
      background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
      background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
      border-radius: 100%;
      box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
  }
  .switch-handle:before {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      margin: -6px 0 0 -6px;
      width: 12px;
      height: 12px;
      background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
      background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
      border-radius: 6px;
      box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
  }
  .switch-input:checked ~ .switch-handle {
      left: 74px;
      box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
  }

/* Transition
========================== */
.switch-label, .switch-handle {
  transition: All 0.3s ease;
  -webkit-transition: All 0.3s ease;
  -moz-transition: All 0.3s ease;
  -o-transition: All 0.3s ease;
}

</style>


@stop

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
   <ol class="breadcrumb">
    <li><a href="#">
     <em class="fa fa-home"></em>
 </a></li>
 <li class="active">Forms</li>
</ol>
</div><!--/.row-->

<div class="row">
   <div class="col-lg-12">
    <h1 class="page-header">User Form</h1>
</div>
</div><!--/.row-->


<div class="row">
   <div class="col-lg-12">

       <div class="panel panel-default">
         <div class="panel-heading">Forms</div>'
         <div class="panel-body">
          <div class="col-md-12">
            <form action="{{ route('admin.post-subadmin') }}" class="ajaxformclass" id="admin-subadmin" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <div class="alert" style="margin-top:10px;display:none;">
                        <a href="javascript:void()" class="close" data-dismiss="" aria-label="close">&times;</a><strong class="ajax_message"></strong>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                 <label>First Name</label>
                 <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
             </div>
             <div class="form-group">
                <label>Username</label>
                <input type="email" name="username" placeholder="Enter Your Email" class="form-control">
            </div>
            =
            <div class="form-group">
             <label>Profile Pic.</label>
             <input type="file" name="profile_pic">
             <p class="help-block">Example Add Image Size 20kb..</p>
         </div>

         <div class="form-group">
          <label>Status</label>
          <select class="form-control" name="status">
           <option value="Pending"> Pending </option>
           <option value="Approve">Approve</option>
       </select>
   </div>
   <div class="form-group">
      <label>Last Name</label>
      <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">

  </div>
  <div class="form-group">
      <label>Mobile no.</label>
      <input type="text" name="mobileno" class="form-control" placeholder="Enter Mobile Number">

  </div>
  <div class="form-group">
      <label>User Type </label>
      @php
      if(Sentinel::check()){
        $user = Sentinel::getUser();
    }
    @endphp

    <label class="switch">
        <input class="switch-input" name="user_type" type="checkbox" checked="" />
        <span class="switch-label" data-on="Agent"  @if($user->user_type == "Subadmin")  data-off="User" @else data-off="Subadmin" @endif></span>
        <span class="switch-handle"></span>
    </label>

</div>


<button type="submit" class="btn btn-primary">Submit Button</button>
<button type="reset" class="btn btn-default">Reset Button</button>
</div>
</form>
</div>
</div>
</div><!-- /.panel-->
</div><!-- /.col-->
@stop
@section('footer_scripts')
<script type="text/javascript">
    $('.switch-input').on('change', function() {
        @if($user->user_type == "Subadmin")
        result = document.getElementsByClassName("switch-input")[0].checked ? 'Agent' : 'User';
        @else
        result = document.getElementsByClassName("switch-input")[0].checked ? 'Agent' : 'Subadmin';
        @endif
        alert(result);


    });
</script>
@stop