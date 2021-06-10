@extends('admin.layouts.default')
{{-- Page title --}}
@section('title')
All Subadmin
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<style type="text/css">
    .dataTables_processing{
        display: none !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="http://localhost/neosoft/public/admin/css/dataTables.bootstrap.css" />
@stop
{{-- Page content --}}
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <section class="content-header">
        <h1>Subadmin Manager</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Subadmin Manager</li>
            <li class="active">Subadmin List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
         <div class="panel panel-primary ">
          <div class="panel-heading clearfix">
            <h4 class="panel-title pull-left"> <i class="livicon" data-name="list" data-size="20" data-loop="true" data-c="#fff" data-hc="white"></i>
                Subadmin List
            </h4>
            <div class="pull-right">
                <a href="{{ route("admin.subadmin") }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span>Add Subadmin</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Profile Photo</th>
                            <th>First Name</th>
                            <th>Username</th>
                            <th>Mobile No</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    <!-- row-->
</section>
</div>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="http://localhost/neosoft/public/admin/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://localhost/neosoft/public/admin/js/dataTables.bootstrap.js"></script>
<script>
    $(function() {
        var table = $('#table1').DataTable({
            processing: true,
            serverSide: true,
            aaSorting : [[0, 'desc']],
            ajax: '{!! route('admin.subadmin.data') !!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'profile_pic', name: 'profile_pic',render:function(data,type,row,meta){ return displayimage(data,type,row,meta)} },
            { data: 'first_name', name: 'first_name' },
            { data: 'username', name: 'username',render:function(data,type,row,meta){ return na(data,type,row,meta)} },
            { data: 'mobileno', name: 'mobileno' },
                   // { data: 'city', name: 'city' },
                   { data: 'actions', name: 'actions', orderable: true, searchable: true }
                   ]
               });
        table.on( 'draw', function () {
            $('.livicon').each(function(){
                $(this).updateLivicon();
            });
        } );
    });
    function na(data,type,row,meta)
    {
       if(data)
           return data;
       else
           return "Not Provided";
   }
   function displayimage(data,type,row,meta)
   {
    if(data){

        var imageurl=' http://localhost/neosoft/storage/app/uploads/user/profile/'+data;
        var str='<img src="'+imageurl+'" + style="width: 32%;" />';
    }
    else{
       var imageurl='{{ asset("assets/admin/default_user.png") }}';
       var str='<img height="60" src="'+imageurl+'" />';
   }
   return str;
}
</script>
@stop