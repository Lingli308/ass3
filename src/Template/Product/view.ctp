<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->p_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->p_id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->p_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Image'), ['controller' => 'ProductImage', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Image'), ['controller' => 'ProductImage', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="product view large-9 medium-8 columns content">
    <h3><?= h($product->p_id) ?></h3>
    <<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th scope="row"><?= __('P Name') ?></th>
            <td><?= h($product->p_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('P Purchase Price Money') ?></th>
            <td><?= h($product->p_purchase_price_money) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('P Sale Price Money') ?></th>
            <td><?= h($product->p_sale_price_money) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('P Country Of Origin') ?></th>
            <td><?= h($product->p_country_of_origin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('P Id') ?></th>
            <td><?= $this->Number->format($product->p_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Category') ?></h4>
        <?php if (!empty($product->category)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('C Id') ?></th>
                <th scope="col"><?= __('C Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->category as $category): ?>
            <tr>
                <td><?= h($category->c_id) ?></td>
                <td><?= h($category->c_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Category', 'action' => 'view', $category->c_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Category', 'action' => 'edit', $category->c_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Category', 'action' => 'delete', $category->c_id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->c_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Image') ?></h4>
        <?php if (!empty($product->product_image)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Image Id') ?></th>
                <th scope="col"><?= __('Image Name') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_image as $productImage): ?>
            <tr>
                <td><?= h($productImage->image_id) ?></td>
                <td><?= h($productImage->image_name) ?></td>
                <td><?= h($productImage->product_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductImage', 'action' => 'view', $productImage->image_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductImage', 'action' => 'edit', $productImage->image_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductImage', 'action' => 'delete', $productImage->image_id], ['confirm' => __('Are you sure you want to delete # {0}?', $productImage->image_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
