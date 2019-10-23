!function(a,b){"object"==typeof exports&&"undefined"!=typeof module?module.exports=b():"function"==typeof define&&define.amd?define(b):a.VueDragging=b()}(this,function(){"use strict";function b(a,b){if(!(a instanceof b))throw new TypeError("Cannot call a class as a function")}var a=function(){function a(a,b){var c,d;for(c=0;c<b.length;c++)d=b[c],d.enumerable=d.enumerable||!1,d.configurable=!0,"value"in d&&(d.writable=!0),Object.defineProperty(a,d.key,d)}return function(b,c,d){return c&&a(b.prototype,c),d&&a(b,d),b}}(),c=function(){function c(){b(this,c),this.data={}}return a(c,[{key:"new",value:function(a){return this.data[a]||(this.data[a]={className:"",List:[],KEY_MAP:{}}),this.data[a]}},{key:"get",value:function(a){return this.data[a]}}]),c}(),d={listeners:{},$on:function(a,b){var c=this.listeners[a];c||(this.listeners[a]=[]),this.listeners[a].push(b)},$once:function(a,b){function d(){c.$off(a,d);for(var e=arguments.length,f=Array(e),g=0;e>g;g++)f[g]=arguments[g];b.apply(c,f)}var c=this;this.$on(a,d)},$off:function(a,b){var c=this.listeners[a];return b&&c?(this.listeners[a]=this.listeners[a].filter(function(a){return a!==b}),void 0):(this.listeners[a]=[],void 0)},$emit:function(a,b){var c=this.listeners[a];c&&c.length>0&&c.forEach(function(a){a(b)})}},e={on:function(a,b,c){a.addEventListener(b,c)},off:function(a,b,c){a.removeEventListener(b,c)},addClass:function(a,b){if(arguments.length<2)a.classList.add(b);else for(var c=1,d=arguments.length;d>c;c++)a.classList.add(arguments[c])},removeClass:function(a,b){if(arguments.length<2)a.classList.remove(b);else for(var c=1,d=arguments.length;d>c;c++)a.classList.remove(arguments[c])}},f=function(a){function j(a){var b=q(a.target),c=b.getAttribute("drag_group"),d=b.getAttribute("drag_key"),f=g.new(c),h=f.KEY_MAP[d],j=f.List.indexOf(h);e.addClass(b,"dragging"),a.dataTransfer&&(a.dataTransfer.effectAllowed="move",a.dataTransfer.setData("text",JSON.stringify(h))),i={index:j,item:h,el:b,group:c}}function k(a){return a.preventDefault&&a.preventDefault(),!1}function l(a){var c,e,f,j,k,l,b=void 0;"touchmove"===a.type?(a.stopPropagation(),a.preventDefault(),b=s(a),b=q(b)):b=q(a.target),b&&i&&(c=b.getAttribute("drag_group"),c===i.group&&i.el&&i.item&&b!==i.el&&(e=b.getAttribute("drag_key"),f=g.new(c),j=f.KEY_MAP[e],j!==i.item&&(k=f.List.indexOf(j),l=f.List.indexOf(i.item),r(f.List,l,k),i.index=k,h=!0,d.$emit("dragged",{draged:i.item,to:j,value:f.value,group:c}))))}function m(a){e.removeClass(q(a.target),"drag-over","drag-enter")}function n(){}function o(a){var c,b=q(a.target);e.removeClass(b,"dragging","drag-over","drag-enter"),i=null,h=!1,c=b.getAttribute("drag_group"),d.$emit("dragend",{group:c})}function p(a){return a.preventDefault(),a.stopPropagation&&a.stopPropagation(),!1}function q(a){if(a)for(;a.parentNode;){if(a.getAttribute&&a.getAttribute("drag_block"))return a;a=a.parentNode}}function r(b,c,d){var e=b[d];return f?(b.$set(d,b[c]),b.$set(c,e)):(a.set(b,d,b[c]),a.set(b,c,e)),b}function s(a){var b=a.touches[0],c=document.elementFromPoint(b.clientX,b.clientY);return c}function t(a,b,c){var d=b.value.item,h=b.value.list,i=g.new(b.value.group),q=f?b.value.key:c.key;i.value=b.value,i.className=b.value.className,i.KEY_MAP[q]=d,h&&i.List!==h&&(i.List=h),a.setAttribute("draggable","true"),a.setAttribute("drag_group",b.value.group),a.setAttribute("drag_block",b.value.group),a.setAttribute("drag_key",q),e.on(a,"dragstart",j),e.on(a,"dragenter",l),e.on(a,"dragover",k),e.on(a,"drag",n),e.on(a,"dragleave",m),e.on(a,"dragend",o),e.on(a,"drop",p),e.on(a,"touchstart",j),e.on(a,"touchmove",l),e.on(a,"touchend",o)}function u(a,b,c){var d=g.new(b.value.group),h=f?b.value.key:c.key;d.KEY_MAP[h]=void 0,e.off(a,"dragstart",j),e.off(a,"dragenter",l),e.off(a,"dragover",k),e.off(a,"drag",n),e.off(a,"dragleave",m),e.off(a,"dragend",o),e.off(a,"drop",p),e.off(a,"touchstart",j),e.off(a,"touchmove",l),e.off(a,"touchend",o)}var f="1"===a.version.split(".")[0],g=new c,h=!1,i=null;a.prototype.$dragging=d,f?a.directive("dragging",{update:function(a,b){t(this.el,{modifiers:this.modifiers,arg:this.arg,value:a,oldValue:b})},unbind:function(a,b){u(this.el,{modifiers:this.modifiers,arg:this.arg,value:a?a:{group:this.el.getAttribute("drag_group")},oldValue:b})}}):a.directive("dragging",{bind:t,update:function(a,b,c){var d=g.new(b.value.group),e=b.value.item,f=b.value.list,h=c.key,i=d.KEY_MAP[h];e&&i!==e&&(d.KEY_MAP[h]=e),f&&d.List!==f&&(d.List=f)},unbind:u})};return f});