'use strict';

{
  let opinion = document.querySelectorAll("td.opinion");
  
  opinion.forEach(e => {

    let text = e.textContent;

    let slicetext = text.length > 25 ? (text).slice(0, 25) + "..." : text;
    
    e.innerHTML = slicetext;
    
    e.addEventListener('mouseover', () => {
      e.innerHTML = text;
    }),

    e.addEventListener('mouseleave', () => {
      e.innerHTML = slicetext;
    });
    
  });

}