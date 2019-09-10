<?php
echo $this->Form->create('Blog', array('url' => array_merge(array('action' => 'test'),$this->params['pass'])));
echo $this->Form->input('body', array('div' => false));echo $this->Form->submit(__('Search'), array('div' => false));
echo $this->Form->end();
?>