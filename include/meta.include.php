
<noscript>Ops, esse site não funcionará corretamente no seu navegador pois ele não dá suporte ao JavaScript :/</noscript>
<script src="./layout/js/jquery-1.12.3.min.js"></script>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="layout/page/engine1/style.css" />
<script type="text/javascript" src="layout/page/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

<link rel="stylesheet" href="./layout/css/font-awesome.min.css">

<script src="./layout/js/menu.js"></script>

<script src="./layout/js/modernizr.custom.js"></script>



<title><?php echo $title; ?></title>
<meta name="Description" content="<?php echo $description ?>" />
<meta name="Keywords" content="<?php echo $keywords; ?>" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
<meta name="Googlebot" content="all"/>
<meta name="robots" content="index, follow"/>
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $description; ?>" />
<link rel="stylesheet" type="text/css" href="./layout/css/style.css" />
<meta property="og:locale" content="pt_BR"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://animetoys.com.br<?php if (_URI_ != '/') echo _URI_; ?>" />
<meta name="url" content="http://animetoys.com.br<?php if (_URI_ != '/') echo _URI_; ?>" />
<meta property="og:site_name" content="Anime Toys"/>
<meta name="geo.placename" content="Brasil"/>
<meta name="geo.region" content="Brasil"/>

<meta name="expires" content="never"/>

<meta name="author" content="Twelve Monkeys"/>
<meta name="DC.Language" content="pt-BR"/>
<meta name="DC.Publisher" content="Twelve Monkeys"/>
<meta name="DC.Title" content="<?php echo $title; ?>" />
<meta name="DC.Description" content="<?php echo $description; ?>" />
<link rel="icon" href="./layout/img/favicon/favicon16.png" sizes="16x16"/>
<link rel="icon" href="./layout/img/favicon/favicon32.png" sizes="32x32"/>
<link rel="icon" href="./layout/img/favicon/favicon48.png" sizes="48x48"/>
<link rel="icon" href="./layout/img/favicon/favicon64.png" sizes="64x64"/>
<link rel="apple-touch-icon" sizes="144x144" href="./layout/img/favicon/favicon114.png"/>
<link rel="apple-touch-icon" sizes="114x114" href="./layout/img/favicon/favicon114.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="./layout/img/favicon/favicon72.png"/>
<link rel="apple-touch-icon" href="./layout/img/favicon/favicon16.png"/>
<meta name="company" content="Anime Toys"/>
<meta name="rating" content="general"/>
<meta name="audience" content="all"/>
<link rel="canonical" href="http://animetoys.com.br<?php if (_URI_ != '/') echo "/" . str_replace("/", "", _URI_); ?>" />
<meta http-equiv="Cache-control" content="no-cache" />

<script>

!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){var c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){var h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);var p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(var a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){var c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){var b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){var a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){var b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){var c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){var k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){var c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){var b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}var B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);var a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){var a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});

jQuery(function($){
 
   $("#telefone").mask("(99) 99999-9999");
  
});

</script>