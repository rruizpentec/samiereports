define(["jquery"],function(a){return{init:function(){a(function(){var b=window.addEventListener?"addEventListener":"attachEvent",c=window[b],d="attachEvent"==b?"onmessage":"message",e="";c(d,function(b){a("#samiereportsframe").css("height",b.data+100+"px")},!1),a('link[rel="stylesheet"]').each(function(){""!==e&&(e+=";"),e+=a(this).attr("href")}),a("#stylesheets").val(e),a("#redirectToIframe").submit()})}}});