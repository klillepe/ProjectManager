<?= $this->Form->create($project) ?>
<fieldset>
  <legend><?= __('Edit Project') ?></legend>
  <?php
    echo $this->Form->input('name');
    echo $this->Form->input('c_name', ['label' => 'Client']);
    echo $this->Form->input('user_id', ['label' => 'Leader', 'options' => $users]);
    echo $this->Form->input('capacity');
    echo $this->Form->input('estimated_time');
    echo $this->Form->input('start_date', ['empty' => true]);
    echo $this->Form->input('deadline', ['empty' => true]);
    echo $this->Form->input('p_status', ['label' => 'Status', 'options' => ['Ettevalmistamisel' => 'Ettevalmistamisel', 'Töös' => 'Töös', 'Lõpetatud' => 'Lõpetatud']]);
  ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

