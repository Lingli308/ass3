<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="product form columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= 'Search Product' ?></legend>
        <table class="table table-bordered">
        <?php
        ?>
        <tr>
            <td> <?php echo $this->Form->control('country_of_origin');?></td>
            <td> <?php echo $this->Form->control('price'); ?></td>
            <td> <?php echo $this->Form->control('category'); ?></td>

        </tr>
        </table>
    </fieldset>
    <?= $this->Form->button('Search') ?>
    <?= $this->Form->end() ?>
</div>

<br>
<br>
<br>
<br>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $product
 */
?>

<div class="product index columns content">
    <h3><?= __('Product') ?></h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('product_name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('product_sale_price') ?></th>
            <th scope="col"><?= $this->Paginator->sort('country_of_origin') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($product as $product): ?>
            <tr>
                <td><?= h($product->p_name) ?></td>
                <td><?= h($this -> Number ->format($product->p_sale_price_money,
                        ['places' => 2, 'before' => '$ ']))  ?></td>
                <td><?= h($product->p_country_of_origin) ?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
