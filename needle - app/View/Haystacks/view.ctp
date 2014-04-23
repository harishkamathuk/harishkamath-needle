<div class="haystacks view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Haystack'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Haystack'), array('action' => 'edit', $haystack['Haystack']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Haystack'), array('action' => 'delete', $haystack['Haystack']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $haystack['Haystack']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Haystacks'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Haystack'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Urls'), array('controller' => 'urls', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Url'), array('controller' => 'urls', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($haystack['Haystack']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Url'); ?></th>
		<td>
			<?php echo $this->Html->link($haystack['Url']['name'], array('controller' => 'urls', 'action' => 'view', $haystack['Url']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Haystack'); ?></th>
		<td>
			<?php echo h($haystack['Haystack']['haystack']); ?>
			<?php echo h($this->Text->truncate($haystack['Haystack']['haystack'],
    1024, array('ellipsis' => '...','exact' => false))); ?> <!-- TODO: Move to config -->
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Needle Found'); ?></th>
		<td>
			<?php echo h($haystack['Haystack']['needle_found']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($haystack['Haystack']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created By'); ?></th>
		<td>
			<?php echo h($haystack['Haystack']['created_by']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($haystack['Haystack']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified By'); ?></th>
		<td>
			<?php echo h($haystack['Haystack']['modified_by']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

