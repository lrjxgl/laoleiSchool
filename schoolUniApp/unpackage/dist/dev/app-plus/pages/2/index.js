
      !(function(){
        var uniAppViewReadyCallback = function(){
          setCssToHead([".",[1],"pd-10{ padding: 10px; }\n.",[1],"b{color: red;}\n",],undefined,{path:"./pages/2/index.wxss"})();
document.dispatchEvent(new CustomEvent("generateFuncReady", { detail: { generateFunc: $gwx('./pages/2/index.wxml') } }));
        }
        if(window.__uniAppViewReady__){
          uniAppViewReadyCallback()
        }else{
          document.addEventListener('uniAppViewReady',uniAppViewReadyCallback)
        }
      })();
      