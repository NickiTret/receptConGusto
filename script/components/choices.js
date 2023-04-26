import Choices from "choices.js";
const element = document.querySelector('.default');

if(element) {
    const defaultSelect = () => {
    
        const choices = new Choices(element, {
              // searchEnabled: false,
              noResultsText: 'Ничего не найдено'
          });
      
          let ariaLabel = element.getAttribute('aria-label');
          element.closest('.choices').setAttribute('aria-label', ariaLabel);
      };
      
      defaultSelect();
}


    
    // const multiDefault = () => {
    //     const elements = document.querySelectorAll('.multi-default');
    //     elements.forEach(el => {
    //         const choices = new Choices(el, {
    //             // searchEnabled: false,
    //             noResultsText: 'Ничего не найдено'
    //         });
    //     });
        
    // }
    
    // multiDefault();
    
    // const groupSelect = () => {
    //     const element = document.querySelector('.group-select');
    //   const choices = new Choices(element, {
    //         // searchEnabled: false,
    //         noResultsText: 'Ничего не найдено'
    //     });
    // };
    
    // groupSelect();