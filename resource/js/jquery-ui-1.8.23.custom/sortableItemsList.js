$(function() {
		$( "#selectedSortableList, #availableSortableList" ).sortable({
			cancel: ".ui-state-disabled"
		});

		$( "#selectedSortableList, #availableSortableList" ).sortable({
			connectWith: ".connectedSortable"
		}).disableSelection();
});
