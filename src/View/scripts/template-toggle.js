                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
// Replaces all instances of the given substring.
String.prototype.replaceAll = function(strTarget,strSubString)
	{
		var strText = this;
		var intIndexOfMatch = strText.indexOf( strTarget );
 
		// Keep looping while an instance of the target string
		// still exists in the string.
		while (intIndexOfMatch != -1){
		// Replace out the current instance.
		strText = strText.replace( strTarget, strSubString )
 
		// Get the index of any next matching substring.
		intIndexOfMatch = strText.indexOf( strTarget );
	}
	// Return the updated string with ALL the target strings
	// replaced out with the new substring.
	return( strText );
}

function toggle(target) {
	var off = ",";
	if (readCookie('offids')){
		off = readCookie('offids');
		}
	//if (readCookie('onids')){
		//var on = readCookie('onids');
		//}
	if ( typeof(target) == 'string')
		category = "cat_" + target;
		category = document.getElementById(category);
		image = "img_" + target;
		image = document.getElementById(image);
	if ( category.style.display == 'block' ) {
		newval = 'none';
		newimg = '/images/template/portal-on.gif';
		off = off + target + ",";
		createCookie('offids',off,14);
		}
	else 
		{
		newval = 'block';
		newimg = '/images/template/portal-off.gif';
		var replacestring = target + ",";
		off = off.replaceAll(replacestring,"");
		createCookie('offids',off,14);
		}

	category.style.display = newval;
	image.src = newimg;
}

function toggler(target) {
	if ( typeof(target) == 'string')
		category = "cat_" + target;
		category = document.getElementById(category);
		image = "img_" + target;
		image = document.getElementById(image);
	if ( category.style.display == 'block' ) {
		newval = 'none';
		newimg = '/images/template/portal-on.gif';
		}
	else 
		{
		newval = 'block';
		newimg = '/images/template/portal-off.gif';
		}

	category.style.display = newval;
	image.src = newimg;
}

function toggleit(target) {
   // if ( typeof(target) == 'string')
	targetElement = document.getElementById(target);
	targetElementPM = document.getElementById(target+'_pm');

	if ( targetElement.style.display == 'block' ) {
		newval = 'none';
		newimage = 'portal-on.gif';
	} else {
		newval = 'block';
		newimage = 'portal-off.gif';
	}
	targetElement.style.display = newval;
	targetElementPM.src = '/images/template/' + newimage;
	
}






