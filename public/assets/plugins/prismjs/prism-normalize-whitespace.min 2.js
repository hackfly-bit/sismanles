!function(){if("undefined"!=typeof Prism){var e=Object.assign||function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},t={"remove-trailing":"boolean","remove-indent":"boolean","left-trim":"boolean","right-trim":"boolean","break-lines":"number",indent:"number","remove-initial-line-feed":"boolean","tabs-to-spaces":"number","spaces-to-tabs":"number"};n.prototype={setDefaults:function(t){this.defaults=e(this.defaults,t)},normalize:function(t,n){for(var r in n=e(this.defaults,n)){var i=r.replace(/-(\w)/g,(function(e,t){return t.toUpperCase()}));"normalize"!==r&&"setDefaults"!==i&&n[r]&&this[i]&&(t=this[i].call(this,t,n[r]))}return t},leftTrim:function(e){return e.replace(/^\s+/,"")},rightTrim:function(e){return e.replace(/\s+$/,"")},tabsToSpaces:function(e,t){return t=0|t||4,e.replace(/\t/g,new Array(++t).join(" "))},spacesToTabs:function(e,t){return t=0|t||4,e.replace(RegExp(" {"+t+"}","g"),"\t")},removeTrailing:function(e){return e.replace(/\s*?$/gm,"")},removeInitialLineFeed:function(e){return e.replace(/^(?:\r?\n|\r)/,"")},removeIndent:function(e){var t=e.match(/^[^\S\n\r]*(?=\S)/gm);return t&&t[0].length?(t.sort((function(e,t){return e.length-t.length})),t[0].length?e.replace(RegExp("^"+t[0],"gm"),""):e):e},indent:function(e,t){return e.replace(/^[^\S\n\r]*(?=\S)/gm,new Array(++t).join("\t")+"$&")},breakLines:function(e,t){t=!0===t?80:0|t||80;for(var n=e.split("\n"),i=0;i<n.length;++i)if(!(r(n[i])<=t)){for(var o=n[i].split(/(\s+)/g),a=0,l=0;l<o.length;++l){var s=r(o[l]);(a+=s)>t&&(o[l]="\n"+o[l],a=s)}n[i]=o.join("")}return n.join("\n")}},"undefined"!=typeof module&&module.exports&&(module.exports=n),Prism.plugins.NormalizeWhitespace=new n({"remove-trailing":!0,"remove-indent":!0,"left-trim":!0,"right-trim":!0}),Prism.hooks.add("before-sanity-check",(function(e){var n=Prism.plugins.NormalizeWhitespace;if((!e.settings||!1!==e.settings["whitespace-normalization"])&&Prism.util.isActive(e.element,"whitespace-normalization",!0))if(e.element&&e.element.parentNode||!e.code){var r=e.element.parentNode;if(e.code&&r&&"pre"===r.nodeName.toLowerCase()){for(var i in null==e.settings&&(e.settings={}),t)if(Object.hasOwnProperty.call(t,i)){var o=t[i];if(r.hasAttribute("data-"+i))try{var a=JSON.parse(r.getAttribute("data-"+i)||"true");typeof a===o&&(e.settings[i]=a)}catch(e){}}for(var l=r.childNodes,s="",c="",u=!1,m=0;m<l.length;++m){var f=l[m];f==e.element?u=!0:"#text"===f.nodeName&&(u?c+=f.nodeValue:s+=f.nodeValue,r.removeChild(f),--m)}if(e.element.children.length&&Prism.plugins.KeepMarkup){var d=s+e.element.innerHTML+c;e.element.innerHTML=n.normalize(d,e.settings),e.code=e.element.textContent}else e.code=s+e.code+c,e.code=n.normalize(e.code,e.settings)}}else e.code=n.normalize(e.code,e.settings)}))}function n(t){this.defaults=e({},t)}function r(e){for(var t=0,n=0;n<e.length;++n)e.charCodeAt(n)=="\t".charCodeAt(0)&&(t+=3);return e.length+t}}();