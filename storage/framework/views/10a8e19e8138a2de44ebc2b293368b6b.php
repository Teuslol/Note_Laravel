<?php $__env->startSection('content'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card p-5">

                    <!-- logo -->
                    <div class="text-center p-3">
                        <img src="assets/images/logo.png" alt="Notes logo">
                    </div>

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="/loginSubmit" method="post" novalidate>
                                <!-- Token de segurança -->
                                             <?php echo csrf_field(); ?>
                                             <!--UserName-->
                                <div class="mb-3">
                                    <label for="text_username" class="form-label">Username</label>
                                    <input type="email" class="form-control bg-dark text-info" name="text_username" value="<?php echo e(old('text_username')); ?>" required>
                                        <!-- Show ERRORS username -->
                                        <?php $__errorArgs = ['text_username'];
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

                                <!--Passoword-->
                                <div class="mb-3">
                                    <label for="text_password" class="form-label">Password</label>
                                    <input type="password" class="form-control bg-dark text-info" name="text_password" value="<?php echo e(old('text_password')); ?>"required>
                                        <!-- Show ERRORS PassWord -->
                                        <?php $__errorArgs = ['text_password'];
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
                                    <button type="submit" class="btn btn-secondary w-100">LOGIN</button>
                                </div>
                            </form>

                            
                            <?php if(@session('loginError')): ?>
                            <div class="alert alert-danger text-center">
                                <?php echo e(session('loginError')); ?>

                            </div>
                            <?php endif; ?>


                        </div>
                    </div>

                    <!-- copy -->
                    <div class="text-center text-secondary mt-3">
                        <small>&copy; <?= date('Y') ?> Notes</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bloconotas\resources\views/login.blade.php ENDPATH**/ ?>