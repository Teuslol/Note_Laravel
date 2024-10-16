<div class="row mb-3 align-items-center">
    <div class="col">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Notes logo">
        </a>
    </div>
    <div class="col text-center">
        A simple <span class="text-warning">Laravel</span> project!
    </div>
    <div class="col">
        <div class="d-flex justify-content-end align-items-center">
            <span class="me-3"><i class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i><?php echo e(session('user.username')); ?></span>
            <a href="<?php echo e(route('logout')); ?>" class="btn btn-outline-secondary px-3">
                Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
            </a>
        </div>
    </div>
</div>

<hr>
<?php /**PATH C:\laragon\www\bloconotas\resources\views/layouts/top_bar.blade.php ENDPATH**/ ?>