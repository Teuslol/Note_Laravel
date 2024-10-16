<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            <?php echo $__env->make('layouts.top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- no notes available -->
            <?php if(count($notes) == 0 ): ?>
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="display-6 mb-5 text-secondary opacity-50">You have no notes available!</p>
                    <a href="<?php echo e(route('new')); ?>" class="btn btn-secondary btn-lg p-3 px-5">
                        <i class="fa-regular fa-pen-to-square me-3"></i>Create Your First Note
                    </a>
                </div>
            </div>

            <!-- temp -->
            <hr class="my-5">

            <?php else: ?>
            <!-- notes are available -->
            <div class="d-flex justify-content-end mb-3">
                <a href="<?php echo e(route('new')); ?>" class="btn btn-secondary px-3">
                    <i class="fa-regular fa-pen-to-square me-2"></i>New Note
                </a>
            </div>

             <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('layouts.note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloconotas\resources\views/home.blade.php ENDPATH**/ ?>