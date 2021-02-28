<?php $__env->startSection('titulo'); ?>
<?php echo e($sala[0]->nome); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="row justify-content-around">
        <div class="col-4">
            <h4>1ª Etapa</h4>
            <ul class="list-group">

                <?php $__currentLoopData = $etapa1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item align-items-center">
                        ID:<?php echo e($pessoa->id); ?>    <?php echo e($pessoa->nome); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>


        <div class="col-4 float-end">
            <h4>2ª Etapa</h4>
            <ul class="list-group mt-3">

                <?php $__currentLoopData = $etapa2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item align-items-center">
                        ID:<?php echo e($pessoa->id); ?>    <?php echo e($pessoa->nome); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\LW Treinamentos\Treinamentos\resources\views/salas/show.blade.php ENDPATH**/ ?>