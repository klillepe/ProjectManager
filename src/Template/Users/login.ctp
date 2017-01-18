<?= $this->Form->create() ?>
        <?= __('Please enter your username and password') ?>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>