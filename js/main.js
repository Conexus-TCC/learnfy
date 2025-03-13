
  /**
   * 
   * @param {Array<string>} whiteList 
   */
   function removejs(whiteList=[])
   {
      whiteList.push("main")
      let body= document.body;
      let script= body.querySelectorAll('script');
      script
      .forEach(e=>{
          e.remove();
          const scr= document.createElement("script")
          scr.src = e.src
          body.appendChild(scr)
        
      })
   }

