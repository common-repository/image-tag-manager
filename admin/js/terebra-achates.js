/*@https://t3rebra.github.io/src/js/min/achates.min.js*/!function(e,r){function i(){const i={version:{name:"T3rebra Achates",id:"1.0",description:"Vanilla Js Mini Library",filename:"achates.js",url:"https://t3rebra.github.io/src/js/achates.js",date:"September 29, 2019 02:57am",author:"t3rebra@gmail.com"},ready:(r=null)=>{e.onload=r()},id:(e=null,t=null)=>{if(e&&t){if((t=String(t)).match(/[^#a-z0-9-_]/gim))return i.query(e,t);if(-1==t.indexOf("#")||0==t.indexOf("#"))return e.getElementById(t.replace(/#/gim,""))}else if(e){if((e=String(e)).match(/[^#a-z0-9-_]/gim))return i.query(e);if(-1==e.indexOf("#")||0==e.indexOf("#"))return r.getElementById(e.replace(/#/gim,""))}return!1},class:(e=null,t=null)=>{if(e&&t){if((t=String(t)).match(/[^.a-z0-9-_]/gim))return i.query(e,t);if(-1==t.indexOf(".")||0==t.indexOf("."))return e.getElementsByClassName(t.replace(/\./gim,""))[0]}else if(e){if((e=String(e)).match(/[^.a-z0-9-_]/gim))return i.query(e);if(-1==e.indexOf(".")||0==e.indexOf("."))return r.getElementsByClassName(e.replace(/\./gim,""))[0]}return!1},classes:(e=null,t=null)=>{if(e&&t){if((t=String(t)).match(/[^.a-z0-9-_]/gim))return i.queries(e,t);if(-1==t.indexOf(".")||0==t.indexOf("."))return e.getElementsByClassName(t.replace(/\./gim,""))}else if(e){if((e=String(e)).match(/[^.a-z0-9-_]/gim))return i.queries(e);if(-1==e.indexOf(".")||0==e.indexOf("."))return r.getElementsByClassName(e.replace(/\./gim,""))}return!1},query:(e=null,i=null)=>i?(i=String(i),e.querySelector(i)):!!e&&(e=String(e),r.querySelector(e)),queries:(e=null,i=null)=>e&&i?(i=String(i),e.querySelectorAll(i)):e?(e=String(e),r.querySelectorAll(e)):void 0,tag:(e=null,t=null)=>{if(e&&t){return(t=String(t)).match(/[^a-z]/gim)?i.queries(e,t)[0]:e.getElementsByTagName(t)[0]}if(e){return(e=String(e)).match(/[^a-z]/gim)?i.queries(e)[0]:r.getElementsByTagName(e)[0]}return!1},tags:(e=null,t=null)=>{if(e&&t){return(t=String(t)).match(/[^a-z]/gim)?i.queries(e,t):e.getElementsByTagName(t)}if(e){return(e=String(e)).match(/[^a-z]/gim)?i.queries(e):r.getElementsByTagName(e)}return!1},hash:()=>void 0!==e.location.hash&&""!=e.location.hash&&e.location.hash};return i.queryall=i.queries,i}void 0===e.t3rebra01||null==e.t3rebra01||void 0===e.t301||null==e.t301?(e.t3rebra01=i(),e.t301=i()):console.info("T3rebra is Defined")}(window,document);
