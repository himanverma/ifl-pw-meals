<div class="recipes index">
	<h2><?php echo __('Recipes'); ?></h2>
        <div class="well">
            <form method="post" action="<?php echo $this->Html->url('/Recipes'); ?>">
                <div class="form-group">
                    <input type="text" name="data[keyword]" class="form-control" value="<?php echo $this->request->data('keyword'); ?>" placeholder="keyword..." />
                </div>
                <div class="form-group">
                    <select name="data[field]" class="form-control">
                        <option value="Recipe.recipe_name">Recipe Name</option>
                        <option value="Recipe.description">Description</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <button type="button" onclick="javascript: window.location = '/Recipes'" class="btn btn-primary">Reset</button>
                
            </form>
        </div>
	<table cellpadding="0" cellspacing="0" class="table-bordered table-responsive table-striped table table-mailbox table-hover">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th></th>
			<th><?php echo $this->Paginator->sort('recipe_name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('also_known_as'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo h($recipe['Recipe']['id']); ?>&nbsp;</td>
                <td>
                    <img src="<?php echo h($recipe['Recipe']['image_bowl']); ?>" /></td>
		<td><?php echo h($recipe['Recipe']['recipe_name']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['description']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['also_known_as']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipe['Recipe']['id']), array(), __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Meal Menus'), array('controller' => 'meal_menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meal Menu'), array('controller' => 'meal_menus', 'action' => 'add')); ?> </li>
	</ul>
</div>
