<?php $__env->startSection('titulo'); ?>
    Cadastrar Sala de Evento
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

    <?php if(!empty($mensagem)): ?>
        <div class="alert alert-success w-50">
            <?php echo e($mensagem); ?>

        </div>
    <?php endif; ?>

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

    <form action="/salas/criar" method="post">
        <?php echo csrf_field(); ?>

        <div class=" row">
            <div class="col col-2">
                <label for="nome"> Sala: </label>
                <input type="text" name="nome" id="nome" required placeholder="A1" class="form-control">
            </div>

            <div class="col col-2">
                <label for="lotacao"> Lotação: </label>
                <input type="number" min="1" class="form-control" required placeholder="15" name="lotacao" id="lotacao">

            </div>

        </div>
            <input type="submit" value="Salvar" class="btn btn-primary mt-2">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lucas\Desktop\treinamentos-master\Treinamentos\resources\views/salas/create.blade.php ENDPATH**/ ?>