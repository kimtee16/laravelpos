

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Add User</h4>
                        <a href="#" style="float:right" class="btn btn-dark" data-toggle="modal" data-target="#addUser">
                            <i class="fa fa-plus"></i> Add New User </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php if($user->is_admin == 1): ?> Admin
                                        <?php else: ?> Cashier
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#showUser<?php echo e($user->id); ?>"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editUser<?php echo e($user->id); ?>"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser<?php echo e($user->id); ?>"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal of Show User Detail -->
                                <div class="modal right fade" id="showUser<?php echo e($user->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">User</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                <?php echo e($user->id); ?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('users.show', $user->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('put'); ?>
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input readonly type="text" name="name" id="" value="<?php echo e($user->name); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input readonly type="email" name="email" id="" value="<?php echo e($user->email); ?>" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="phone" id="" value="<?php echo e($user->phone); ?>" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input readonly type="password" name="password" readonly value="<?php echo e($user->password); ?>" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" name="comfirm_password" id="" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Role</label>
                                                        <div name="is_admin" id="" class="form-control" readonly>
                                                            <p> <?php if($user->is_admin==1): ?>
                                                                Admin
                                                                <?php elseif($user->is_admin==2): ?>
                                                                Cashier
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal of Edit User Detail -->
                                <div class="modal right fade" id="editUser<?php echo e($user->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Edit User</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                <?php echo e($user->id); ?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('users.update', $user->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('put'); ?>
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" id="" value="<?php echo e($user->name); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" id="" value="<?php echo e($user->email); ?>" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" name="phone" id="" value="<?php echo e($user->phone); ?>" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password" readonly value="<?php echo e($user->password); ?>" class="form-control">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" name="comfirm_password" id="" class="form-control">
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="">Role</label>
                                                        <select name="is_admin" id="" class="form-control">
                                                            <option value="1" <?php if($user->is_admin==1): ?>
                                                                selected
                                                                <?php endif; ?>>Admin</option>
                                                            <option value="2" <?php if($user->is_admin==2): ?>
                                                                selected
                                                                <?php endif; ?>>Cashier</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning btn-block">Update User</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Modal of Delete User Detail -->
                                <div class="modal right fade" id="deleteUser<?php echo e($user->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Delete User</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                <?php echo e($user->id); ?>

                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <p>Are you sure you want to delete this <?php echo e($user->name); ?> ? </p>

                                                    <div class="modal-footer">
                                                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Search User</h4>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal of adding new user -->
<div class="modal right fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Add User</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('users.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="confirm_password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="is_admin" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Cashier</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block">Save User</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<style>
    .modal.right .modal-dialog {
        margin-left: 500px;
        /* position: absolute;
        top: 0;
        right: 0;
        margin-right: 20vh;*/
    }


    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\pos\resources\views/users/index.blade.php ENDPATH**/ ?>