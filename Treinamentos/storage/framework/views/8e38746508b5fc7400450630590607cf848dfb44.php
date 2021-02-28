<?php $__env->startSection('titulo'); ?>
    Salas de Coffee Break
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

        <ul class="list-group">
            <?php $__currentLoopData = $pessoas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                     <?php echo e($pessoa->nome); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\Treinamentos\Treinamentos\resources\views/cafe/show.blade.php ENDPATH**/ ?>