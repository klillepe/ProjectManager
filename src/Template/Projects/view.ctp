<div>
  <h3><?= h($project->name) ?></h3>
  <table class="table">
    <tr>
      <th scope="row"><?= __('Name') ?></th>
      <td><?= h($project->name) ?><span class="status" style="color:<?= h($project->project_status) ?>"></span></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Client') ?></th>
      <td><?= h($project->c_name) ?></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Leader') ?></th>
      <td><?= h($project->user->username)?></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Estimated Time') ?></th>
      <td><?= h($project->estimated_time) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Status') ?></th>
        <td><?= h($project->p_status) ?></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Id') ?></th>
      <td><?= $this->Number->format($project->id) ?></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Capacity') ?></th>
      <td><?= $this->Number->format($project->capacity) ?></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Time Spent') ?></th>
      <td><?= $this->Number->format($project->time_spent) ?></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Start Date') ?></th>
      <td><?= h($project->start_date) ?></td>
    </tr>
    <tr>
      <th scope="row"><?= __('Deadline') ?></th>
      <td><?= h($project->deadline) ?></td>
    </tr>
  </table>
</div>
