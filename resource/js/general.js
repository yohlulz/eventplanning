$(function() {
	var event_create_steps=document.getElementById('event_create_steps');
	if(event_create_steps){
		$('#event_create_steps').click(function(){
			var selectedSteps=document.getElementById('selectedSortableList');
			if(selectedSteps){
				$('#selectedSortableList').find('li.step_item').each(function(){
					alert($(this).text());
				});
			}
		});
	}
});
