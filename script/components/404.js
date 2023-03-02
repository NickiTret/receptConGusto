import { gsap } from "gsap";

const errorPage = document.querySelector('.error-page')

console.log(errorPage)

if(errorPage) {
    let animation = gsap.timeline({
        paused: false,
        repeat: 99
    });
    
    animation.to(".circle", {
        x: "random(-200, 200, 5)",
        y: "random(-80, 100, 5)",
        duration: 1,
        ease: "back",
        repeat: -1,
        repeatRefresh: true
    });
}

