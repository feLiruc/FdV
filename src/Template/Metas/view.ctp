<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Meta $meta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Meta'), ['action' => 'edit', $meta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Meta'), ['action' => 'delete', $meta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Metas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Meta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Canais'), ['controller' => 'Canais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canal'), ['controller' => 'Canais', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Culturas'), ['controller' => 'Culturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cultura'), ['controller' => 'Culturas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Familias'), ['controller' => 'Familias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Familia'), ['controller' => 'Familias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="metas view large-9 medium-8 columns content">
    <h3><?= $this->Number->format($meta->id) ?>. <?= h($meta->descricao) ?> | <?= $meta->has('cultura') ? $this->Html->link($meta->cultura->descricao, ['controller' => 'Culturas', 'action' => 'view', $meta->cultura->id]) : '(META GERAL)' ?></h3>
    <div class="related">
        <h4><?= __('Famílias Relacionadas') ?></h4>
        <div>
            <a href="#" id="addLinha">+ Família</a>
        </div>
        <?php if (!empty($meta->metas_familias)): ?>
        <?= $this->Form->create('metasFamilia', ['url' => ['controller' => 'MetasFamilias', 'action' => 'addAll', $meta->id]]) ?>
            <table cellpadding="0" cellspacing="0" id="tabelaMetas">
                <tr>
                    <th scope="col" width="50px"><?= __('#') ?></th>
                    <th scope="col"><?= __('Família') ?></th>
                    <th scope="col"><?= __('Volume') ?></th>
                    <th scope="col" class="text-center"><?= __('Ações') ?></th>
                </tr>
                <?php foreach ($meta->metas_familias as $meta_familias): ?>
                <tr>
                    <td><?= h($meta_familias->id) ?></td>
                    <td><?php foreach($meta->familias as $familiaprod):
                        if($familiaprod->id === $meta_familias->familia_id){
                            echo $familiaprod->descricao;
                        }
                        endforeach;
                    ?></td>
                    <td><?= $this->Number->format($meta_familias->volume) ?></td>
                    <td class="actions text-center">
                        <?= $this->Html->link(__('Excluir'), ['controller' => 'MetasFamilias', 'action' => 'delete', $meta_familias->id, $meta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $meta_familias->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit" style="width: 100%;height: 40px;line-height: 10px;background-color: #43ac6a;margin:0;" class="salvarTodos">Salvar Todos</button>
        <?= $this->Form->end() ?>
        <?php endif; ?>
    </div>
</div>


<script>

    var numLinha = 0;

    $('#addLinha').click(function(e){
        
        var textoLinha = `<tr>
                <td>
                    <input name="data[${numLinha}][meta_id]" type="hidden" value="${<?= $meta->id ?>}">
                </td>
                <td>
                    <select name="data[${numLinha}][familia_id]" class="select${numLinha}familia" style="margin:0;">
                    </select>
                </td>
                <td>
                    <input type="text" name="data[${numLinha}][volume]" style="margin:0;">
                </td>
                <td class="text-center">
                    <button type="submit" style="height: 37px;line-height: 8px;background-color: #43ac6a;margin:0;" class="salvarLinha">Salvar</button> <a href="#" class="removeLinha">Excluir</a>
                </td>
            </tr>`;

        $('#tabelaMetas')
            .append(textoLinha)
            .ready(function () {

                $.ajax({
                    type: "GET",
                    url: "/FdV/api/getFamilias",
                    async: false,
                    success: function(data){
                        // Parse the returned json data
                        for(var i = 0; i < data.length; i++){

                            $(`.select${numLinha}familia`).append('<option value="' + data[i]['id'] + '">' + data[i]['descricao'] + '</option>');
                            
                        }
                    }
                });

                $(`.removeLinha`).off().click(function(e){
                    e.preventDefault();
                    $(this).parent().parent().remove();
                });

                $(`.salvarLinha`).off().click(function(e){
                    e.preventDefault();
                    var id = $(this).parent().parent().find('input[type="hidden"]').val();
                    var familia = $(this).parent().parent().find('select').val();
                    var volume = $(this).parent().parent().find('input[type="text"]').val();
                    var jsonValues = {'meta_id': id, 'familia_id': familia, 'volume': volume};
                    if(id&&familia&&volume){
                        $.ajax({
                            type: "POST",
                            headers: 
                            {
                                'X-CSRF-TOKEN': <?= json_encode($this->request->param('_csrfToken')); ?>
                            },
                            url: '/FdV/MetasFamilias/add',
                            data: jsonValues,
                            success: function(data){
                                location.reload();
                            }
                        });
                    }                    
                });

                numLinha += 1;
            });

    });

</script>