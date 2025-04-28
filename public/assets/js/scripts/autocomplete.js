// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var x = event.keyCode;
    if (x == 40) {  // 27 is the ESC key
        //alert ("You pressed the Escape key!");
    }
	
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#stage_id').val();
	
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#stage_list_id').show();
				$('#stage_list_id').html(data);
			}
		});
	} else {
		$('#stage_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item,id_stage) {
	// change input value
	$('#stage_id').val(item);
	// hide proposition list
	$('#stage_list_id').hide();
	//alert(id_stage);
	document.location.replace("reservations.php?num_materiel="+id_stage);
	
}

//////////////////////////////////////////////////////////////////////////////////////////////
function autocompletIndex() {
	var x = event.keyCode;
    if (x == 40) {  // 27 is the ESC key
        //alert ("You pressed the Escape key!");
    }
	
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#stage_id').val();
	
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh_materiel.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#stage_list_id').show();
				$('#stage_list_id').html(data);
			}
		});
	} else {
		$('#stage_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_itemIndex(item,id_stage) {
	$('#stage_id').val(item);
	$('#stage_list_id').hide();
	document.location.replace("fiche_materiel.php?num_materiel="+id_stage);
	
}


//////////////////////////////////////////////////////////////////////////////////////////////
function autocompletIndexUser() {
	var x = event.keyCode;
    if (x == 40) {  // 27 is the ESC key
        //alert ("You pressed the Escape key!");
    }
	
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#user_id').val();
	
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh_user.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#user_list_id').show();
				$('#user_list_id').html(data);
			}
		});
	} else {
		$('#user_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_itemIndexUser(item,id_stage) {
	$('#user_id').val(item);
	$('#user_list_id').hide();
	document.location.replace("fiche_utilsateur.php?num_etudiant="+id_stage);
	
}
///////////////////////////////////////MOTS CLES LOT//////////////////////////////////////

function autocompletIndexLot() {
	var x = event.keyCode;
    if (x == 40) {  // 27 is the ESC key
        //alert ("You pressed the Escape key!");
    }
	
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#stage_id_lot').val();
	
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh_lot.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#stage_list_id_lot').show();
				$('#stage_list_id_lot').html(data);
			}
		});
	} else {
		$('#stage_list_id_lot').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_itemIndexLot(item,id_stage) {
	$('#stage_id_lot').val(item);
	$('#stage_list_id_lot').hide();
	document.location.replace("fiche_materiel.php?num_materiel=l"+id_stage);
	
}


///////////////////////////////////////MOTS CLES LOT POUR RESERVATION//////////////////////////////////////

function autocompletIndexLotRes() {
	var x = event.keyCode;
    if (x == 40) {  // 27 is the ESC key
        //alert ("You pressed the Escape key!");
    }
	
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#stage_id_lot_res').val();
	
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh_lot_res.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#stage_list_id_lot_res').show();
				$('#stage_list_id_lot_res').html(data);
			}
		});
	} else {
		$('#stage_list_id_lot_res').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_itemIndexLotRes(item,id_stage) {
	$('#stage_id_lot_res').val(item);
	$('#stage_list_id_lot_res').hide();
	document.location.replace("reservations.php?num_materiel=l"+id_stage);
	
}