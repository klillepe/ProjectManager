<div class="col-xs-18 col-md-12">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Client') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Leader') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Capacity') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Time spent') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Estimation') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Created') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Deadline') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
          <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($projects as $project): ?>
        <tr>
          <td><?= h($project->name) ?> <span class="status" style="color:<?= h($project->project_status) ?>"></span></td>
          <td><?= h($project->c_name) ?></td>
          <td><?= h($project->user->username)?></td>
          <td><?= $this->Number->format($project->capacity) ?>(hours)</td>
          <td><?= h($project->time_spent) ?>(hours)</td>
          <td><?= h($project->estimated_time) ?></td>
          <td><?= h($project->start_date->format('Y-m-d')) ?></td>
          <td><?= h($project->deadline->format('Y-m-d')) ?></td>
          <td><?= h($project->p_status) ?></td>
          <td class="actions">
              <?= $this->Html->link(__('<span class="glyphicon glyphicon-list-alt"></span>'), ['action' => 'view', $project->id], ['escape' => false]) ?>
              <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $project->id], ['escape' => false]) ?>
              <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'),['action' => 'delete', $project->id],['escape' => false, 'confirm' => __('Are you sure you want to delete - {0}?', $project->name)]) ?> 
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
</div>
