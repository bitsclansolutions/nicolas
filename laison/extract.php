<?php

?>
<img src="images/1.png" style="cursor:crosshair" alt=""            
     onmousedown="getColor(event,
                           this,
                           document.getElementById('result'),
                           1);" />
 
<img src="" id="result"  />
 


<script type="text/javascript">
function getColor(e,img,resObj,range,scriptPath) {
	  var req = false;
	  if (window.XMLHttpRequest) req = new XMLHttpRequest();
	  else if (window.ActiveXObject) {
	    try { req = new ActiveXObject('Msxml2.XMLHTTP');}
	    catch (e) {
	      try { req = new ActiveXObject('Microsoft.XMLHTTP');}
	      catch (e) {}
	    }
	  }
	  if (!req) return false;
	  else {
		  resObj.src =(scriptPath || '')+
          'getColor.php?coords='+getMousePos(e,getOrigin(img))+
          '&range='+range+'&img='+img.src;
	  
	  
	  }
	}
	  

	function getMousePos (e,relXY) {
	  if(!e) var e = window.event;
	  if(typeof e.pageX === 'number') return [e.pageX - relXY[0], e.pageY - relXY[1]];
	  else return [e.clientX + document.body.scrollLeft +
	               document.documentElement.scrollLeft - relXY[0],
	               e.clientY + document.body.scrollTop +
	               document.documentElement.scrollTop - relXY[1]];
	}
	  
	function getOrigin(obj) {
	  var parent=box=null, pos=[];
	  
	  this.getStyle = function (prop) {
	    if (obj.currentStyle) return obj.currentStyle[prop];
	    else if (window.getComputedStyle) return
	        document.defaultView.getComputedStyle(obj,null).getPropertyValue(prop);
	  }
	  
	  if (obj.parentNode === null || this.getStyle('display') == 'none') return false;
	  if (obj.getBoundingClientRect) { // IE
	    box = obj.getBoundingClientRect();
	    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	    var scrollLeft = document.documentElement.scrollLeft
	                     || document.body.scrollLeft;
	  
	    return [Math.round(box.left) + scrollLeft, Math.round(box.top) + scrollTop];
	  } else if (document.getBoxObjectFor) { // gecko
	    box = document.getBoxObjectFor(obj);
	    pos = [box.x, box.y];
	  } else { // safari/opera
	    pos = [obj.offsetLeft, obj.offsetTop];
	    parent = obj.offsetParent;
	    if (parent != obj) {
	      while (parent) {
	        pos[0] += parent.offsetLeft;
	        pos[1] += parent.offsetTop;
	        parent = parent.offsetParent;
	      }
	    }
	    var ua = navigator.userAgent.toLowerCase();
	    if (ua.indexOf('opera') != -1 ||
	       (ua.indexOf('safari') != -1 &&
	        this.getStyle('position') == 'absolute')) {
	          pos[1] -= document.body.offsetTop;
	    };
	  }
	  if (obj.parentNode) parent = obj.parentNode;
	  else parent = null;
	  while (parent && parent.tagName != 'BODY' && parent.tagName != 'HTML') {
	    pos[0] -= parent.scrollLeft;
	    pos[1] -= parent.scrollTop;
	    if (parent.parentNode) parent = parent.parentNode;
	    else parent = null;
	  }
	  return pos;
	}
</script>
