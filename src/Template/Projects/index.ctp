<div class="col-xs-18 col-md-12">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <td colspan="4" class="text-center"><h3><?= __('Projects') ?></h3></td>
        </tr>
        <tr>
          <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Deadline') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
        </tr>
      </thead>
        <tbody>
        <?php foreach ($projects as $project): ?>
        <tr>
          <td><?= h($project->name) ?> <span class="status" style="color:<?= h($project->project_status) ?>"></span>
          </td>
          <td><?= h($project->deadline) ?></td>
          <td><?= h($project->p_status) ?></td>
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