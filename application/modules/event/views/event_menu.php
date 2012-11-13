<div id="main_menu" class="event_menu_holder welcome1">
    <div class="container_12 account_form">
        <div class="grid_12">
            <ul>
                <li<?php if ($current == 'create') echo ' class="active"'; ?>><?php echo anchor('event/steps/index/'.$type.'/create'.'#main_menu', lang('event_menu_create')); ?></li>
                <li<?php if ($current == 'edit') echo ' class="active"'; ?>><?php echo anchor('event/steps/index/'.$type.'/edit'.'#main_menu', lang('event_menu_edit')); ?></li>
                <li<?php if ($current == 'history') echo ' class="active"'; ?>><?php echo anchor('event/steps/index/'.$type.'/history'.'#main_menu', lang('event_menu_history')); ?></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>