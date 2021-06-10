<?php $__env->startSection('title'); ?>
All Agent
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_styles'); ?>
<style type="text/css">
    .dataTables_processing{
        display: none !important;
    }
</style>
<link rel="stylesheet" type="text/css" href="http://localhost/neosoft/public/admin/css/dataTables.bootstrap.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <section class="content-header">
        <h1>Agent Manager</h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li>Agent Manager</li>
            <li class="active">Agent List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
           <div class="panel panel-primary ">
              <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list" data-size="20" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Agent List
                </h4>
                <div class="pull-right">
                    <a href="<?php echo e(route("admin.subadmin")); ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span>Add Agent</a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script type="text/javascript" src="http://localhost/neosoft/public/admin/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="http://localhost/neosoft/public/admin/js/dataTables.bootstrap.js"></script>
<script>
    $(function() {
        var table = $('#table1').DataTable({
            processing: true,
            serverSide: true,
            aaSorting : [[0, 'desc']],
            ajax: '<?php echo route('admin.agent-all.data'); ?>',
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
     var imageurl='<?php echo e(asset("assets/admin/default_user.png")); ?>';
     var str='<img height="60" src="'+imageurl+'" />';
 }
 return str;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/neosoft/resources/views/admin/user/agent/list.blade.php ENDPATH**/ ?>