<?php $__env->startSection('titulo'); ?>
    Cadastrar Pessoas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

    <?php if(!empty($mensagem)): ?>
        <div class="alert alert-danger w-50">
            <?php echo e($mensagem); ?>

        </div>
    <?php endif; ?>

    <form action="/pessoas/criar" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col col-6">
                <label for="nome"> Nome: </label>
                <input type="text" id="nome" name="nome" required placeholder="Joao da Silva" class="form-control">
                <input type="submit" value="Salvar" required class="mt-2 mb-2 float btn btn-primary">
            </div>
        </div>
    </form>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\LW Treinamentos\Treinamentos\resources\views/pessoas/create.blade.php ENDPATH**/ ?>