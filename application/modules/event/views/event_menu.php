<div id="main_menu" class="event_menu_holder welcome1">
    <div class="container_12 account_form">
        <div class="grid_12">
            <ul>
                <li<?php if ($current == 'create_event') echo ' class="active"'; ?>><?php echo anchor('event/steps/create_event/'.$type, lang('event_menu_create')); ?></li>
                <li<?php if ($current == 'edit_event') echo ' class="active"'; ?>><?php echo anchor('event/steps/edit_event/'.$type, lang('event_menu_edit')); ?></li>
                <li<?php if ($current == 'history_event') echo ' class="active"'; ?>><?php echo anchor('event/steps/history_event/'.$type, lang('event_menu_history')); ?></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>