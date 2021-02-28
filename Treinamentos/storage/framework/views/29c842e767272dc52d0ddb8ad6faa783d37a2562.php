<?php $__env->startSection('titulo'); ?>
    Salas de Aula
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

    <ul class="list-group mt-3 w-75 ">
        <?php $__currentLoopData = $salas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sala): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li  class="list-group-item d-flex justify-content-between">
               <a href="/salas/<?php echo e($sala->id); ?>" class="text-decoration-none"> Sala:  <?php echo e($sala->nome); ?> </a>
               <span class=""> Lotação: <?php echo e($sala->lotacao); ?> </span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\treinamentos-master\Treinamentos\resources\views/salas/index.blade.php ENDPATH**/ ?>