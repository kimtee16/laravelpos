<nav class="active" id="sidebar">
    <ul class="list-unstyled lead">
        <li class="active">
            <a href=""> <i class="fa fa-home"></i> Home </a>
        </li>

        <li>
            <a href="<?php echo e(route('users.index')); ?>"> <i class="fa fa-user"></i> Users </a>
        </li>

        <li>
            <a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-utensils fa-md"></i>Products</a>
        </li>

        <li>
            <a href="<?php echo e(route('orders.index')); ?>"><i class="fa fa-shopping-cart fa-md"></i>Orders</a>
        </li>

        
    </ul>
</nav>

<style>
    #sidebar ul.lead {
        border-bottom: 1px solid #47748b;
        width: fit-content;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        font-weight: 400;
        display: block;
        width: 30vh;
        color: #008B8B;
        text-decoration: none !important;
    }

    #sidebar ul li a:hover {
        color: #fff;
        background: #008B8B;
    }

    #sidebar ul li a i {
        margin-right: 10px;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        color: #fff;
        background: #008B8B;
    }
</style><?php /**PATH C:\Users\Administrator\pos\resources\views/layouts/includes/sideBar.blade.php ENDPATH**/ ?>