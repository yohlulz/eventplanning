function getNewSubmitForm(element){
	 var submitForm = document.createElement("FORM");
	 element.appendChild(submitForm);
	 submitForm.method = "POST";
	 return submitForm;
}

function createNewFormElement(inputForm, elementName, elementValue){
	 var newElement = document.createElement("input");
	 newElement.setAttribute("name",'step'+elementName);
	 newElement.setAttribute("type","hidden");
	 inputForm.appendChild(newElement);
	 newElement.value = elementValue;
	 return newElement;
}

$(function() {
	var event_create_steps=document.getElementById('event_create_steps');
	if(event_create_steps){
		$('#event_create_steps').click(function(){
			var selectedSteps=document.getElementById('selectedSortableList');
			if(selectedSteps){
				 var submitForm = getNewSubmitForm(selectedSteps);
				 var count=0;
				 var url_steps=selectedSteps.getAttribute('url');
				$('#selectedSortableList').find('li.step_item').each(function(){
					createNewFormElement(submitForm, ++count,$(this).text());
				});
				submitForm.action= url_steps;
				submitForm.submit();
			}
		});
	}
});
