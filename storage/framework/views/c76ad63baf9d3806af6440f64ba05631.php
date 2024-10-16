<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            <?php echo $__env->make('layouts.top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- label and cancel -->
            <div class="row">
                <div class="col">
                    <p class="display-6 mb-0">NEW NOTE</p>
                </div>
                <div class="col text-end">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-danger">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>

            <!-- form -->
            <form action="<?php echo e(route('newNoteSubmit')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row mt-3">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Note Title</label>
                            <input type="text" class="form-control bg-primary text-white" name="text_title" value="<?php echo e(old('text_title')); ?>">

                            <!-- Show ERRORS -->
                            <?php $__errorArgs = ['text_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Note Text</label>
                            <textarea class="form-control bg-primary text-white" name="text_note" rows="5"><?php echo e(old('text_note')); ?></textarea>

                            <!-- Show ERRORS -->
                            <?php $__errorArgs = ['text_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-end">
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-primary px-5">
                            <i class="fa-solid fa-ban me-2"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-secondary px-5"><i class="fa-regular fa-circle-check me-2"></i>Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloconotas\resources\views/new_note.blade.php ENDPATH**/ ?>