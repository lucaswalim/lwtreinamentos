<?php $__env->startSection('titulo'); ?>
  Ola  <?php echo e($pessoa[0]->nome); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

    <ul class="list-group w-25">
        <li class="list-group-item">  Primeira Etapa Sala:  <?php echo e($salaEtapa1[0]->nome); ?> </li>
        <li class="list-group-item"> Segunda Etapa Sala:  <?php echo e($salaEtapa2[0]->nome); ?> </li>
        <li class="list-group-item"> Intervalo Café Sala:  <?php echo e($salaCafe[0]->nome); ?> </li>
    </ul>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\treinamentos-master\Treinamentos\resources\views/pessoas/show.blade.php ENDPATH**/ ?>