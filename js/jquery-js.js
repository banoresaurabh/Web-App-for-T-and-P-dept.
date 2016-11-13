//-----------Caution!!!! JS AHEAD :p---------------//

function divTophp(){	
	document.getElementById('hiddenInpID').value = document.getElementById('autoGenerateClass').innerHTML;
}



//--------- For auto class selection---------------//

var autoClass = [" ","SE","TE","BE"];

	$('#yearID').change(function(){
		document.getElementById('autoGenerateClass').innerHTML = autoClass[this.value];
	});



//-------- For HSC and Diploma---------------------//
	
	$('#twelth').click(function(){
		if($(this).prop('checked') == true){
			$('#twelth-input').slideDown();
		}

		if($(this).prop('checked') == false){
			$('#twelth-input').slideUp();
			
		}
	});

	$('#deploma').click(function(){
		if($(this).prop('checked') == true){
			$('#deploma-input').slideDown();
		}

		if($(this).prop('checked') == false){
			$('#deploma-input').slideUp();
			
		}
	});

//--------------- The "Other" radio ---------------//

$('.commSSC').click(function(){
	if($('#radioSSC').is(':checked') == true){
			$('#textSSC').slideDown();
		}

	if($('#radioSSC').is(':checked') == false){
			$('#textSSC').slideUp();
			
		}
});

$('.commHSC').click(function(){
	if($('#radioHSC').is(':checked') == true){
			$('#textHSC').slideDown();
		}

	if($('#radioHSC').is(':checked') == false){
			$('#textHSC').slideUp();
			
		}
});

$('.commDIP').click(function(){
	if($('#radioDeploma').is(':checked') == true){
			$('#textDeploma').slideDown();
		}

	if($('#radioDeploma').is(':checked') == false){
			$('#textDeploma').slideUp();
			
		}
});

$('.commEng').click(function(){
	if($('#radioEngg').is(':checked') === true){
			$('#textEngg').slideDown();
		}

	if($('#radioEngg').is(':checked') === false){
			$('#textEngg').slideUp();
			
		}
});

//-----------------------Year gap-----------------------------------//

$('.comm').click(function()
{
	if($('#gap').is(':checked'))
	{
		$('#gapSelectID').slideDown();
	}
	else
	{
		$('#gapSelectID').slideUp();
	}
});

//--------------------clickable-rows------------------------------------//

$(document).ready(function($){
	$(".clickable-row").click(function(){
		window.location = $(this).data("href");
	});
});

<<<<<<< HEAD
=======
//---------------------- For taking branch at runtime------------------------//

$(document).ready(function(){
	$("#comp").change(function(){
		 compVal = document.getElementById('comp').value;
		 alert(compVal);
	});
});
//----------------------- The adder and remover------------------------------------//

$(document).ready(function(){
	var i = 1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id = "row'+i+'"><td><input type = "text" name="name[]" id="nameOfStud"></td><td><button name="remove" id="'+i+'" class = "btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click','.btn_remove',function(){
		var button_id = $(this).attr('id');
		$('#row'+button_id+'').remove();
	});

	$('#btn-update').click(function(){
		$.ajax({
			url:"updater.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data){
				alert(data);
				$("#add_name")[0].reset();
			}
		});
	});
});
>>>>>>> master
