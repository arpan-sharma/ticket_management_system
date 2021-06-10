<?php $__env->startSection('title'); ?>
Report Management | Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_styles'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="container" style="margin-top: 80px;" >
        <div class="row">
            <div class="col-xs-10">
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h2 class="panel-title">
                          Ticket Report
                      </h2>
                  </div>
                  <div class="panel-body">
                    <h3>
                        <?php
                        if(Sentinel::check()){
                            $user = Sentinel::getUser();
                        }
                        ?>
                        Welcome <?php echo e($user->first_name); ?>

                    </h3>
                </div>
                <ul class="list-group">

                    <li class="list-group-item">
                        <h4>Report</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>start date</th>
                                    <th>Priority</th>
                                    <th>Ticket Status</th>
                                    <th>Serial No.</th>
                                    <th>Model No.</th>
                                    <th>User Name.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($data) >  0): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($value->created_at); ?></td>
                                    <td><?php echo e($value->priority); ?></td>
                                    <td><?php echo e($value->ticket_status); ?></td>
                                    <td><?php echo e($value->serial_no); ?></td>
                                    <td><?php echo e($value->model_no); ?></td>
                                    <td><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>

                                <tr> <td>
                                    No Data Found
                                </td>  </tr>

                                <?php endif; ?>
                            </tbody>
                        </table>
                    </li>



                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/neosoft/resources/views/admin/ticket/report_genration.blade.php ENDPATH**/ ?>