/*
 * jQuery.BiggerLink v2.0.1
 * http://www.ollicle.com/eg/jquery/biggerlink/
 *
 * Copyright (c) 2009 Oliver Boermans
 * http://creativecommons.org/licenses/MIT/
 *
 * 2009-11-22 (22 Nov 2009)
*/ 
(function(a){a.fn.biggerlink=function(b){var c={biggerclass:"bl-bigger",hoverclass:"bl-hover",hoverclass2:"bl-hover2",clickableclass:"bl-hot",otherstriggermaster:true,follow:"auto"};if(b){a.extend(c,b)}a(this).filter(function(){return a("a",this).length>0}).addClass(c.clickableclass).css("cursor","pointer").each(function(g){var d=a(this).data("biggerlink",{hovered:false,focused:false,hovered2:false,focused2:false});var e={all:a("a",this),big:a(this),master:a("a:first",this).data("biggerlink",{status:"master"}).addClass(c.biggerclass),other:a("a",this).not(a("a:first",this)).data("biggerlink",{status:"other"})};a("a",this).andSelf().each(function(){var i=a.extend(a(this).data("biggerlink"),e);a(this).data("biggerlink",i)});var h=d.attr("title");var f=d.data("biggerlink").master.attr("title");if(f&&!h){d.attr("title",f)}d.mouseover(function(i){window.status=a(this).data("biggerlink").master.get(0).href;a(this).addClass(c.hoverclass);a(this).data("biggerlink").hovered=true}).mouseout(function(i){window.status="";if(!a(this).data("biggerlink").focused){a(this).removeClass(c.hoverclass)}a(this).data("biggerlink").hovered=false}).bind("click",function(i){if(!a(i.target).closest("a").length)


;