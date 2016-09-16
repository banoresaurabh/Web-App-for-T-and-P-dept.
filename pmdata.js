var xmlObject= createXmlHttpRequest();

function createXmlHttpRequest(){
	
	var xmlObject;
	if(window.ActiveXObject){
		try{
			xmlObject= new window.ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlObject=false;
		}
	}else{
		try{
			xmlObject= new XMLHttpRequest();
		}catch(e){
			xmlObject=false;
		}
	}
	
	if(!xmlObject){
		alert("Couldn't create XML Object");
	}else{
		return xmlObject;
	}
}

//id,id_val,branch,compName

function process_approve(){
	
	alert("hey got called!!");
	if(xmlObject.readyState===0 || xmlObject.readyState==4){
			
		xmlObject.open("GET","miner.php?id=" + id+"&branch="+branch, true);
		xmlObject.onreadystatechange = callBack(id_val);
		xmlObject.send(null);
	}else{
		setTimeout("process_approve()",1000);
	}
}



function callBack(nid_val){
	return function(){
			if(xmlObject.readyState==4){
				if(xmlObject.status==200){
					message = this.responseText;
					
					str1="greendiv"; str2="reddiv" ;str3="neudiv";
						str1=str1.concat(nid_val);
						str2=str2.concat(nid_val);
						str3=str3.concat(nid_val);
				    if(message[0]=="O"){
						document.getElementById("result").style.display='block';
						document.getElementById("result").innerHTML = message;
					}else if(message.charAt(3)=="1"){							
						
						document.getElementById(str1).className="btn btn-success disabled";
						document.getElementById(str2).className="btn btn-danger disabled";
						document.getElementById("result").style.display='block';
						document.getElementById("result").innerHTML = message;
					}else if(message.charAt(3)=="2"){
						
						document.getElementById(str2).className="btn btn-danger disabled";
						document.getElementById(str1).className="btn btn-success disabled";
						document.getElementById("result").style.display='block';
						document.getElementById("result").innerHTML = message;
					}else if(message.charAt(3)=="3"){
						if(document.getElementById(str2).className=="btn btn-danger disabled"){
							document.getElementById(str2).className="btn btn-danger active";
							document.getElementById(str1).className="btn btn-success active";
						}
						
					}							
				}else{
					alert("Something went wrong");
				}
			}
	}; 
}