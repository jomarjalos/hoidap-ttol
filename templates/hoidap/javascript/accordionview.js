/*Copyright (c) 2008, Yahoo! Inc. All rights reserved.
Code licensed under the BSD License:
http://developer.yahoo.net/yui/license.txt */
function getResponsebad( i,id,faqid )
{
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

	ajaxRequest.onreadystatechange = function() {
			if(ajaxRequest.readyState == 4){
				var ajaxDisplay                                 =  ajaxRequest.responseText;

				if(ajaxDisplay!=null){
					document.getElementById( 'al-bad'+id ).style.display="block";
				}
				document.getElementById( 'al-bad'+id ).innerHTML  =  ajaxDisplay;
				var bad = document.getElementById( 'rev-bad'+id ).innerHTML
				 if(ajaxDisplay != " You have already voted this Answer") {
				document.getElementById( 'rev-bad'+id ).innerHTML = parseInt(bad) + 1;
				}
			}
		}

	var path	= document.getElementById('site_path').value;

	//var timeNow = Math.floor(Math.random()*11);
	var lurl = '&faqid='+faqid+'&id='+id
	var url=path+'index.php?option=com_jequestions&view=questions&task=responsebad';
	ajaxRequest.open("GET", url + lurl, true);
	ajaxRequest.send(null);
}
function getResponsegood( i,id,faqid )
{

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

	ajaxRequest.onreadystatechange = function() {
			if(ajaxRequest.readyState == 4){
				var ajaxDisplay                                 =  ajaxRequest.responseText;

				if(ajaxDisplay!=null){
					document.getElementById( 'al-bad'+id ).style.display="block";
				}

				document.getElementById( 'al-bad'+id ).innerHTML  =  ajaxDisplay;
				var good = document.getElementById( 'rev-good'+id ).innerHTML
				 if(ajaxDisplay != " You have already voted this Answer") {
				document.getElementById( 'rev-good'+id ).innerHTML = parseInt(good) + 1;
				}
			}
		}

	var path	= document.getElementById('site_path').value;

	//var timeNow = Math.floor(Math.random()*11);
	var lurl = '&faqid='+faqid+'&id='+id
	var url=path+'index.php?option=com_jequestions&view=questions&task=responsegood';

	ajaxRequest.open("GET", url + lurl, true);
	ajaxRequest.send(null);
}
function getResponseexcell( i,id,faqid )
{

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

	ajaxRequest.onreadystatechange = function() {
			if(ajaxRequest.readyState == 4){
				var ajaxDisplay                                 =  ajaxRequest.responseText;

				if(ajaxDisplay!=null){
					document.getElementById( 'al-bad'+id ).style.display="block";
				}

				document.getElementById( 'al-bad'+id ).innerHTML  =  ajaxDisplay;
				var excell = document.getElementById( 'rev-excellent'+id ).innerHTML
				 if(ajaxDisplay != " You have already voted this Answer") {
				document.getElementById( 'rev-excellent'+id ).innerHTML = parseInt(excell) + 1;
				}
			}
		}

	var path	= document.getElementById('site_path').value;

	//var timeNow = Math.floor(Math.random()*11);
	var lurl = '&faqid='+faqid+'&id='+id
	var url=path+'index.php?option=com_jequestions&view=questions&task=responseexcell';

	ajaxRequest.open("GET", url + lurl, true);
	ajaxRequest.send(null);
}


