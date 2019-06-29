
      !(function(){
        var uniAppViewReadyCallback = function(){
          setCssToHead([".",[1],"h160{ height:160px; }\n",],undefined,{path:"./pages/index/saveimg.wxss"})();
document.dispatchEvent(new CustomEvent("generateFuncReady", { detail: { generateFunc: $gwx('./pages/index/saveimg.wxml') } }));
        }
        if(window.__uniAppViewReady__){
          uniAppViewReadyCallback()
        }else{
          document.addEventListener('uniAppViewReady',uniAppViewReadyCallback)
        }
      })();
      