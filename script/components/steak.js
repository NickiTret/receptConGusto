// class Steak {
//     constructor(element, option) {
//         this.element = document.querySelector(element);
//         this.items = option.items;
//         this.hoverList = this.element.querySelector('.hover-list');
//         this.element.addEventListener('mouseover', (event) => {
//             console.log(event.target)

//             if (event.target.dataset.id) {
//                 this.show()
//             }
//         })
//         this.element.addEventListener('mouseout', (event) => {
//             if (event.target.dataset.id) {
//                 this.hide()
//             }
//         })
//     }

//     show() {
//         this.hoverList.classList.add('show');
//     }

//     hide() {
//         this.hoverList.classList.remove('show');
//     }
// }

// const dropdown = new Steak('#steak', {
//     items: [
//         {
//             id: 1,
//             title: 'title 1',
//             description: 'Описание 1'

//         }
//     ]
// });

