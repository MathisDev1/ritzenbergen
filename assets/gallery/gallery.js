my = (function(){
	var brData = [
		{'name':'Firefox','value':44.9},
		{'name':'Chrome','value':41.5},
		{'name':'Safari','value':8.7},
		{'name':'Opera','value':2.8},
		{'name':'MSIE','value':0.1},
		{'name':'Edge','value':0.0},
		{'name':'Mobile','value':0.0},
		{'name':'Mozilla','value':0.0},
		{'name':'Netscape','value':0.0},
		];
	brData.sort((a,b) => b.value-a.value)	
	var lsOk=false,date = new Date(),year = date.getFullYear(),month;
	date.getMonth() < 10 ? month = '0'+date.getMonth() : month = date.getMonth();
	//
	function readLS(key){
		return lsOk ? window.localStorage.getItem(key) : false;
	}
	//
	function writeLS(key,value){
		if(lsOk) window.localStorage.setItem(key,value); 
	}
	//
	function storageAvailable() {
		try {
		    var storage = window.localStorage, x = '__storage_test__';
		    storage.setItem(x, x); storage.removeItem(x);
		    lsOk = true;
		}
		catch(e) {
			lsOk = false;
		}
	}
	// font size
	function set_font_size(size){
		switch (size){
			case 'small':
			  document.getElementById("font-k").checked = "checked";
				break;
			case 'normal':
				document.getElementById("font-s").checked = "checked";
				break;
			case 'big':
				document.getElementById("font-g").checked = "checked";
				break;
		}
	}
	//
	function updateBrowser(){
		var query = '.rightpad.browser',elm,i,be,v=0;
		be = document.querySelector(query);
		if(!be) return;
		document.querySelector(query+' .head').innerHTML = 'Browseranteile '+year;
		elm = be.getElementsByTagName('p');
		for(i=elm.length-1;i>=0;i--){elm[i].remove()}
		for(i in brData){
			v+=brData[i].value
			elm = newElement('p',brData[i].name+' '+brData[i].value.toFixed(1)+'%','class='+brData[i].name);
			be.appendChild(elm);
		}
		v = (100-v).toFixed(1);
		elm = newElement('p','sonstige '+v+'%','');
		be.appendChild(elm);
	}
	// -------------------------------------
	// (split arguments width ' ')
	function newElement(elm,txt,atrb){
	  var el = document.createElement(elm),atribs,i,at;
	  el.appendChild(document.createTextNode(txt));
	  if(atrb){
		atribs = atrb.split(' ');
		for(i=0;i<atribs.length;i++){
		  at = atribs[i].split('=');
		  el.setAttribute(at[0],at[1]);
		}
	  }
	  return el;
	}
	//
	function init(){
		storageAvailable();
		if(document.getElementById("inp_form")) focus_to_input();
		var copyUpd = document.getElementById('copyr');
		if(copyUpd) copyUpd.innerHTML = '&copy; Jo Klimek 2010-'+year;
		set_font_size(readLS('font_size'));
		updateBrowser();
	}
	
	document.addEventListener('DOMContentLoaded',init)
	return{
		writeLS:writeLS,
		readLS:readLS
	}
})()