<?php $__env->startSection('titulo'); ?>
    Lista de Alunos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

    <?php if(!empty($mensagem)): ?>
        <div class="alert alert-danger w-50">
            <?php echo e($mensagem); ?>

        </div>
    <?php endif; ?>

    <div class="justify-content-end d-flex">

    </div>
    <ul class="list-group mt-3 w-75">
        <?php $__currentLoopData = $pessoas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pessoa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item align-items-center">
                <a href="/pessoas/<?php echo e($pessoa->id); ?>" class="text-decoration-none"> <?php echo e($pessoa->nome); ?> </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\LW Treinamentos\Treinamentos\resources\views/pessoas/index.blade.php ENDPATH**/ ?>