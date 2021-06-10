<?php $__env->startSection('title'); ?>
Report Management | Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_styles'); ?>

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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
    <h1 class="page-header">Report Genration Form</h1>
</div>
</div><!--/.row-->


<div class="row">
 <div class="col-lg-12">

     <div class="panel panel-default">
       <div class="panel-heading">Forms</div>'
       <div class="panel-body">
          <div class="col-md-12">
            <form action="<?php echo e(route('admin.genrate-report-post')); ?>" class="" id="admin-subadmin" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <div class="alert" style="margin-top:10px;display:none;">
                        <a href="javascript:void()" class="close" data-dismiss="" aria-label="close">&times;</a><strong class="ajax_message"></strong>
                    </div>
                </div>
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" id="datetimepicker_2" name="starting_date"
                    placeholder=" Please Not Select Past date">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" id="datetimepicker_1" name="end_date"
                    placeholder="Select End date  ">
                </div>

                <div class="form-group">
                  <label>Priority</label>
                  <select class="form-control" name="priority">
                    <option value=""> --- Select Priority --- </option>
                    <option value="High"> High </option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                    <option value="Emergency">Emergency</option>
                </select>
            </div>

            <div class="form-group">
              <label>Ticket Status</label>
              <select class="form-control" name="status">
                <option value=""> --- Select Status --- </option>
                <option value="Pending"> Pending </option>
                <option value="Approved">Approved</option>
                <option value="Ready_To_Dispatched">Ready to Dispatched</option>
                <option value="Closed">Closed</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit Button</button>
        <button type="reset" class="btn btn-default">Reset Button</button>
    </div>
</form>
</div>
</div>
</div><!-- /.panel-->
</div><!-- /.col-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/neosoft/resources/views/admin/ticket/report.blade.php ENDPATH**/ ?>