(function () {
	
	var t = _hii, iB, Aa, isValid, brohigt, browid, ie, pg, esc, sC, gC, cK, bro, loca, encd_url, gene_key;	
	
	var Ta = 0,		Ua = {};

	var Le 			= "length",
		Tr  		= "replace",
		SetAc 		= "__setAccount",
		H 			= "height",
		W 			= "width",
		uA 			= "userAgent",
		pF 			= "platform",
		cE 			= "cookieEnabled",
		L       	= "language",
		rt 			= {},
		St 			= "send",
		Pp			= "push",
		loc 		= location;

	var q = N(),
		w = N(),
		e = N(), 
		r = N(), 
		y = N(), 
		u = N(), 
		i = N(), 
		o = N(), 
		p = N(), 
		a = N(), 
		s = N(), 
		d = N(), 
		f = N(), 
		g = N(), 
		h = N(), 
		j = N(), 
		k = N(); 

	function N(a) {
		return Va(Ta++, a)
	}

	function Va(a, b) {
		Ua[a] = !! b;
		return a
	}

	isValid = function (t){
    	 return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?()]/g.test(t);
    }    
    
    
    Aa = function(dat, f){

    	if( typeof dat != "undefined"){
			rt['m'] = dat;
	
			if(typeof String.prototype.trim !== 'function') {
				String.prototype.Tr = function() {
				    return this.replace(/^\s+|\s+$//g,''); 
				  }
					var c = rt['m'].Tr();
			}else{
				var c = rt['m'][Tr](/\s/g, '');
			}
			return c;
    	}	
	}
	
	function Bb(t)
	{
		return typeof t;
	}
	
	function Ca(c){
		return  c[Le] > f && c[Le] < h ? c : false;		
	}
	
	
	sC = function (name, value, expdate)
	{
		var exdate = new Date();		
		exdate.setDate(exdate.getDate() + expdate);
		var c_value=escape(value) + ((k==null) ? "" : "; expires="+null);
		document.cookie=name + "=" + c_value;
	}	

	gC = function (t)
	  {
		
	    var re = new RegExp(t + "=([^;]+)");
	    var value = re.exec(document.cookie);
	    return (value != null) ? unescape(value[1]) : null;
	    
	  }

	pg = function (data) {
    	
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "//localhost/mystats/subtag/default.php?"+encodeURI( data ), false);
        //xmlhttp.open("GET", "//www.tag.haiinteractive.com/default.php?"+encodeURI( data ), false);
        xmlhttp.send();
        //alert(xmlhttp.responseText);
        return xmlhttp.responseText;
    }    

	
	var ScrS = function ( param )
    {

        var D = document;
        
        var b = "body";
        var w = "width";
        
        var scr = "scroll";
        var off = "offset";
        var cli = "client";
        
        return Math.max(
                Math.max(D[b][scr+param], D.documentElement[scr+param]),
                Math.max(D[b][off+param], D.documentElement[off+param]),
                Math.max(D[b][cli+param], D.documentElement[cli+param])
            );

    }

    iB = function ( userAgent, elements ) {
		    var regexps = {
		            'Chrome': [ /Chrome\/(\S+)/ ],
		            'Firefox': [ /Firefox\/(\S+)/ ],
		            'MSIE': [ /MSIE (\S+);/ ],
		            'Opera': [
		                /Opera\/.*?Version\/(\S+)/,     /* Opera 10 */
		                /Opera\/(\S+)/                  /* Opera 9 and older */
		            ],
		            'Safari': [ /Version\/(\S+).*?Safari\// ]
		        },
		        re, m, browser, version;
		 
		    if (userAgent === undefined)
		        userAgent = navigator.userAgent;
		 
		    if (elements === undefined)
		        elements = 2;
		    else if (elements === 0)
		        elements = 1337;

		    for (browser in regexps)
		        while (re = regexps[browser].shift())
		            if (m = userAgent.match(re)) {
		                version = (m[1].match(new RegExp('[^.]+(?:\.[^.]+){0,' + --elements + '}')))[0];
		                return browser + ' ' + version;
		            }

		    return null;
		}

    brohigt = ScrS( H.charAt(0).toUpperCase() + H.slice(1) );
    browid = ScrS( W.charAt(0).toUpperCase() + W.slice(1) );

    esc = function(val)
    {
        return String(val).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
    
    ie = function(){

        if ( navigator.language == undefined ){
        	var langu = navigator.userLanguage;
        }else{
        	var langu = navigator.language;    	
        }

        return langu;

    }
    
    var cG	= function()
    {
   	 	
   	 	if(navigator[cE])
   	 	{
   	 		return 1;
   	 	}else{
   	 		return 0;
   	 	}

    }
    
    var Valu = function(){
    	
    	bro = iB().split(" ");

   	 	cK = cG();

	 	gene_key = gC('gen_key');

	 	if( gene_key != null)
   	 	{
   	 		gene_key = gC('gen_key');
   	 		
   	 	}else{
   	 		
   	 		sC('gen_key', generateHexString(10));
   	 		gene_key = gC('gen_key');
   	 	}

		return "response="+esc(t[w][w])+"&k="+esc(Aa(t[q][w], 'key'))+"&scrnsiz="+screen[H]+"x"+screen[W]+"&bsiz="+brohigt+"x"+browid+"&lang="+ie()+"&broname="+bro[0]+"&brover="+bro[1]+"&useragent="+navigator[uA]+"&platform="+navigator[pF]+"&cookieset="+cK+"&gene_key="+gene_key;
		
    }

    var process = function()
    {
		url = Valu();

   	 	if(isValid(t[w][q]) && Aa(t[q][q], 'event') )		url += "&evtnm="+esc(t[w][q]);
   	 	loca = loc.toString();
    	url += "&url="+encodeURIComponent( loca.replace(".","&dot;") ) ;
    	pg(url);
    }
    
    t[Pp] = function(a)
    {
    	
    	if (typeof a[q] != undefined && typeof a[e] != undefined)
    	{
	       	
	    	//if( ( a[w] == null || a[w] == '' ) || ( gC(SetAc) != a[w]) ){
	
	    		data = Valu();
	    		
	    		loca = loc.toString(); 
	    		if(isValid(a[q]) && Aa(a[q], 'event') )		data += "&evtnm="+esc(a[q]);
	    		encd_url = encodeURIComponent( loca );
	    		data += "&al="+esc(a[w])+"&av="+esc(a[e])+"&url="+encodeURIComponent( loca.replace(".","&dot;") );
	    		sC(SetAc, a[w], k);
	
	    		pg(data);
	    	//}
    	}
    }
    
    
    var generateHexString = function(length) {
    	  var ret = "";
    	  while (ret.length < length) {
    	    ret += Math.random().toString(16).substring(2);
    	  }
    	  return ret.substring(0,length);
    	}

    
    var $ = function () {
    	 
    	if( isValid(t[q][w]) && Ca( Aa(t[q][w], 'key') ) && Bb(t[q][w]) )
    	{
    		//if( ( t[w][w] == null || t[w][w] == '' ) || ( gC(SetAc) != t[w][w]) )	

    		process();
    		
    		sC(SetAc, t[w][w], k); 
    	}else{
    		t[Pp](a);
    	}
    	
    };
    
var M = $();

})();