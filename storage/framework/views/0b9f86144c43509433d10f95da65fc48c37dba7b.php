

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Order Products</h4>
                      
                    </div>
                    <form action="<?php echo e(route('orders.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th><a href="#" class="btn btn-sm btn-success add_more "><i class="fa fa-plus-circle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="product_id[]" id="product_id" class="form-control product_id">
                                                <option value="">Select Item</option>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option data-price="<?php echo e($product->price); ?>" value="<?php echo e($product->id); ?>">
                                                    <?php echo e($product->product_name); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control price">
                                        </td>
                                        <td>
                                            <input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount">
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-danger times-circle"><i class="fa fa-times-circle"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Total: <b class="total" style="color: #41D9D9"> 0.0 </b></h4>
                    </div>
                    <div class="card-body">
                        <div class="panel">
                            <div class="row">
                                <table class="table table-striped">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="">Customer</label>

                                                <input type="text" name="customer_name" id="" class="form-control">

                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <td> Payment Method <br>
                                    <div class="">
                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="cash" checked="checked">
                                            <label for="payment_method"> <i class="fa fa-money-bill text-success"></i> Cash </label>
                                        </span>
                                        <span class="radio-item">
                                            <input type="radio" name="payment_method" id="payment_method" class="true" value="credit Card">
                                            <label for="payment_method"> <i class="fa fa-credit-card text-info"></i> Credit Card </label>
                                        </span>
                                    </div>
                                </td> <br>
                                <td>Payment <input type="number" name="paid_amount" id="paid_amount" class="form-control"></td>
                                <td>Change <input type="number" readonly name="balance" id="balance" class="form-control"></td>
                                <td>
                                    <button class="btn-primary btn-lg btn-block mt-3">Save</button>
                                </td>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>




<style>
    .modal.right .modal-dialog {
        margin-left: 500px;
    }

    .modal.fade:not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }

    .radio-item input[type="radio"] {
        visibility: hidden;
        width: 20px;
        height: 20px;
        margin: 0 5px 0 5px;
        padding: 0;
        cursor: pointer;
    }

    .radio-item input[type="radio"]:before {
        position: relative;
        margin: 4px -25px -4px 0;
        display: inline-block;
        visibility: visible;
        width: 20px;
        height: 20px;
        border-radius: 10px;
        border: 2px inset rgb(150, 150, 150, 0.75);
        background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%, rgb(250, 250, 250) 5%, rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
        content: '';
        cursor: pointer;
    }

    .radio-item input[type="radio"]:checked:after {
        position: relative;
        top: 0;
        left: 9px;
        display: inline-block;
        border-radius: 6px;
        visibility: visible;
        width: 12px;
        height: 12px;
        background: radial-gradient(ellipse at top left,
                rgb(240, 255, 220) 0%,
                rgb(225, 250, 100) 5%,
                rgb(75, 75, 0) 95%,
                rgb(25, 100, 0) 100%);
        content: '';
        cursor: pointer;
    }

    radio-item input[type="radio"].true:checked::after {
        background: radial-gradient(ellipse at top left,
                rgb(240, 255, 220) 0%,
                rgb(225, 250, 100) 5%,
                rgb(75, 75, 0) 95%,
                rgb(25, 100, 0) 100%);
    }

    radio-item input[type="radio"].false:checked::after {
        background: radial-gradient(ellipse at top left,
                rgb(255, 255, 255) 0%,
                rgb(250, 250, 250) 5%,
                rgb(230, 230, 230) 95%,
                rgb(225, 225, 225) 100%);
    }

    .radio-item label {
        display: inline-block;
        margin: 0;
        padding: 0;
        line-height: 25px;
        height: 25px;
        cursor: pointer;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $('.add_more').on('click', function() {
        var product = $('.product_id').html();
        var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
        var tr = '<tr><td class="no">' + numberofrow + '</td>' +
            '<td><select class="form-control product_id" name="product_id[]">' + product +
            '</select></td>' +
            '<td><input type="number" name="quantity[]" class="form-control quantity"></td>' +
            '<td><input type="number" name="price[]" class="form-control price"></td>' +
            '<td><input type="number" name="total_amount[]" class="form-control total_amount"></td>' +
            '<td><a class="btn btn-danger btn-sm delete times-circle"><i class="fa fa-times-circle"></a></td>'
        $('.addMoreProduct').append(tr);
    });

    $('.addMoreProduct').delegate('.delete', 'click', function() {
        $(this).parent().parent().remove();
    });

    function TotalAmount() {
        var total = 0;
        $('.total_amount').each(function(i, e) {
            var amount = $(this).val() - 0;
            total += amount;
        });

        $('.total').html(total);
    }

    $('.addMoreProduct').delegate('.product_id', 'change', function() {
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price');
        tr.find('.price').val(price);
        var quantity = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var total_amount = (quantity * price);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    });

    $('.addMoreProduct').delegate('.quantity', 'keyup', function() {
        var tr = $(this).parent().parent();
        var quantity = tr.find('.quantity').val() - 0;
        var price = tr.find('.price').val() - 0;
        var total_amount = (quantity * price);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    });

    $('#paid_amount').keyup(function() {
        var total = $('.total').html();
        var paid_amount = $(this).val();
        var tot = paid_amount - total;
        $('#balance').val(tot).toFixed(2);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Administrator\pos\resources\views/orders/index.blade.php ENDPATH**/ ?>