                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
function showPNG(strId, strPath, styleStr) {
	if ( pngAlpha() ) {
		document.write('<div style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\''+strPath+'.png\', sizingMethod=\'scale\');'+styleStr+'" id="'+strId+'"></div>');
	} else {
		document.write('<div id="'+strId+'" style="'+styleStr+'"><img src="../home_files/'+strPath+'.png" name="'+strId+'" /></div>');
	}
}

function pngAlpha() {
	var ua = navigator.userAgent.toLowerCase(); 
	isIE = ( (ua.indexOf("msie") != -1) && (ua.indexOf("opera") == -1) && (ua.indexOf("webtv") == -1) ); 
	isWin32 = ((ua.indexOf('win') != -1) && ( ua.indexOf('95') != -1 || ua.indexOf('98') != -1 || ua.indexOf('nt') != -1 || ua.indexOf('win32') != -1 || ua.indexOf('32bit') != -1) );
	versionMinor = parseFloat(navigator.appVersion); 
	if (isIE && versionMinor >= 4) {
		versionMinor = parseFloat( ua.substring( ua.indexOf('msie ') + 5 ) );
	}
	versionMajor = parseInt(versionMinor); 

	if ( isIE && isWin32 && versionMajor < 7 ) {
		return true;	
	} else {
		return false;	
	}	
}
