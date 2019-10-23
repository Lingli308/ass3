<?php
echo "Welcome!";


//echo $this->Html->link(
//    'Enter',
//     '', //C:\wamp64\www\ass3\src\Template\Product\search.ctp
//    ['class' => 'button', 'target' => '_blank']
//);

//echo $this->Html->link(__('Search'), ['action' => 'search']);
//echo $this->Html->link('Search Page', 'search.ctp', ['class' => 'btn btn-danger']);
echo $this->Html->product('search');
