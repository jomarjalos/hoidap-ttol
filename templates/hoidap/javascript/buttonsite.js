$(document).ready(function(){

        $(".slidingDiv").hide();
        $(".show_hide").show();

	$('.show_hide').click(function(){
	$(".slidingDiv").slideToggle();
	});

});

function test( vale )
{
	//alert(vale);
	if(vale == "addcategory"){
		var cbox = document.getElementById('catbox');
		cbox.style.display = "block";
	}
	else
	{
		var cbox = document.getElementById('catbox');
		cbox.style.display = "none";
	}
}

function ltrim(str) {
	for(var k = 0; k < str.length && isWhitespace(str.charAt(k)); k++);
	return str.substring(k, str.length);
}
function rtrim(str) {
	for(var j=str.length-1; j>=0 && isWhitespace(str.charAt(j)) ; j--) ;
	return str.substring(0,j+1);
}
function trim(str) {
	return ltrim(rtrim(str));
}
function isWhitespace(charToCheck) {
	var whitespaceChars = " \t\n\r\f";
	return (whitespaceChars.indexOf(charToCheck) != -1);
}

function form_validate(){
	var elem = document.getElementById( 'jform_answers' );

	if(trim(elem.value) == "")
	{
		return false;
	}
	else
	{
		return true;
  	}
}
function form_validate1()
	{

	var elem1 = document.getElementById( 'jform_questions' );
	var elembl=document.getElementById( 'jform_questions-lbl' );
	if(trim(elem1.value) == "")
	{
		elembl.style.color="red";
		return false;
	}
	else
	{
		return true;
  	}
}

function tagsearch(i){
	var x=document.getElementById("jform_tag").value

	var ajaxRequest;  // The variable that makes Ajax possible!
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
		ajaxRequest.onreadystatechange = function() {
			if(ajaxRequest.readyState == 4){
                 document.getElementById( 'def_srch' ).style.display = "none";
                 document.getElementById( 'srch_dis' ).style.display = "block";
				var ajaxDisplay                                 =  ajaxRequest.responseText;
				document.getElementById( 'srch_dis' ).innerHTML  =  ajaxDisplay;
			}
		}



	var path	= document.getElementById('site_path').value;


	//var timeNow = Math.floor(Math.random()*11);
	var lurl = '&tag='+x
	var url=path+'index.php?option=com_jequestions&view=tags&task=tagsrch';

	ajaxRequest.open("GET", url + lurl, true);
	ajaxRequest.send(null);
}

