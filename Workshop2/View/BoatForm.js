
function AddAllToForm(){
	var memberForm = document.getElementById('memberForm');
	
	var boatTypeLabel = document.createElement('label');	
	boatTypeLabel.for = 'type';
	boatTypeLabel.innerHTML='Boat Type:';

	
	var boatTypeField = document.createElement('input');
	boatTypeField.type = 'text';
	boatTypeField.value = 'type';
	boatTypeField.name = 'type';		
	
	var boatLengthField = document.createElement('input');
	boatLengthField.type = 'text';
	boatLengthField.value = 'length';
	boatLengthField.name = 'length';

	var boatLengthLabel = document.createElement('label');	
	boatLengthLabel.for = 'length'
	boatLengthLabel.innerHTML='Boat Length:';

	deleteBoatButton = document.createElement("button");
	theText = document.createTextNode("Delete Boat");
	deleteBoatButton.appendChild(theText);
	memberForm.appendChild(boatTypeLabel);
	memberForm.appendChild(boatTypeInput);
	memberForm.appendChild(boatLengthLabel);
	memberForm.appendChild(boatLengthInput);
}