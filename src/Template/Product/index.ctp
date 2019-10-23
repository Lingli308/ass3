<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Image'), ['controller' => 'ProductImage', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Image'), ['controller' => 'ProductImage', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="product index large-9 medium-8 columns content">
    <h3><?= __('Product') ?></h3>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('p_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('p_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('p_purchase_price_money') ?></th>
                <th scope="col"><?= $this->Paginator->sort('p_sale_price_money') ?></th>
                <th scope="col"><?= $this->Paginator->sort('p_country_of_origin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->p_id) ?></td>
                <td><?= h($product->p_name) ?></td>
                <td><?= h($product->p_purchase_price_money) ?></td>
                <td><?= h($product->p_sale_price_money) ?></td>
                <td><?= h($product->p_country_of_origin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->p_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->p_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->p_id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->p_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
