<?php $__env->startSection('titulo'); ?>
    Salas de Coffee Break
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

        <ul class="list-group w-75">
            <?php $__currentLoopData = $cafes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cafe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <a class="text-decoration-none" href="/cafe/<?php echo e($cafe->id); ?>">
                        <?php echo e($cafe->nome); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\Treinamentos\Treinamentos\resources\views/cafe/index.blade.php ENDPATH**/ ?>