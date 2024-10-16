<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
<?php echo $__env->make('layouts.top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- confirm delete -->
            <div class="col card p-5 text-center">
                <span class="display-3 mb-5"><i class="fa-solid fa-triangle-exclamation text-warning opacity-50"></i></span>
                <h4 class="text-info mb-3"><?php echo e($note->title); ?></h4>
                <p class="text-secondary">Are you sure you want to delete this note?</p>
                <div class="mt-3">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary px-5 m-2"><i class="fa-solid fa-xmark me-2"></i>No</a>
                    <a href="<?php echo e(route('deleteConfirm', ['id' => Crypt::encrypt($note->id)])); ?>" class="btn btn-danger px-5 m-2"><i class="fa-solid fa-trash me-2"></i>Yes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloconotas\resources\views/delete_note.blade.php ENDPATH**/ ?>