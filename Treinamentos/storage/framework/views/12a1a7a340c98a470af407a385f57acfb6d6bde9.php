<?php $__env->startSection('titulo'); ?>
    Cadastrar Sala de Café
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

    <?php if(!empty($mensagemLimite)): ?>
        <div class="alert alert-danger w-50">
            <?php echo e($mensagemLimite); ?>

        </div>
    <?php endif; ?>

    <?php if(!empty($mensagemCampo)): ?>
        <div class="alert alert-danger w-50">
            <?php echo e($mensagemCampo); ?>

        </div>
    <?php endif; ?>



    <form action="/cafe/criar" method="post">
        <?php echo csrf_field(); ?>
        <label for="nome"> Sala de Café: </label>
        <input type="text" name="nome" id="nome" required class="form-control-sm align-bottom">

        <input type="submit" value="Salvar" class="btn-sm btn-primary mt-2">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\treinamentos-master\Treinamentos\resources\views/cafe/create.blade.php ENDPATH**/ ?>