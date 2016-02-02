                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
function hideCategory(target) {
	if ( typeof(target) == 'string')
		category = "cat_" + target;
		category = document.getElementById(category);
		image = "img_" + target;
		image = document.getElementById(image);
	if ( category != null && category.style.display == 'block' ) {
		newval = 'none';
		newimg = '/images/template/portal-on.gif';
		category.style.display = newval;
		image.src = newimg;
		}
	}

if (readCookie('offids')){
	off = readCookie('offids');
	offArray = off.split(",");
		for(var i=0; i<offArray.length; i++){
			if(offArray[i].length >= 1) {
  				hideCategory(offArray[i]);
			}
		}
	}