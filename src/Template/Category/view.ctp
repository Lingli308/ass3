<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->c_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->c_id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->c_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="category view large-9 medium-8 columns content">
    <h3><?= h($category->c_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('C Name') ?></th>
            <td><?= h($category->c_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C Id') ?></th>
            <td><?= $this->Number->format($category->c_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product') ?></h4>
        <?php if (!empty($category->product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('P Id') ?></th>
                <th scope="col"><?= __('P Name') ?></th>
                <th scope="col"><?= __('P Purchase Price Money') ?></th>
                <th scope="col"><?= __('P Sale Price Money') ?></th>
                <th scope="col"><?= __('P Country Of Origin') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->product as $product): ?>
            <tr>
                <td><?= h($product->p_id) ?></td>
                <td><?= h($product->p_name) ?></td>
                <td><?= h($product->p_purchase_price_money) ?></td>
                <td><?= h($product->p_sale_price_money) ?></td>
                <td><?= h($product->p_country_of_origin) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Product', 'action' => 'view', $product->p_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Product', 'action' => 'edit', $product->p_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Product', 'action' => 'delete', $product->p_id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->p_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
