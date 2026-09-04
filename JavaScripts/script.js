'use strict';

// navbar toggle 
const navbar = document.querySelector("[data-navbar]");
const navToggler = document.getElementById("navToggle");

navToggler.addEventListener("click", () => navbar.classList.toggle("active"));



// header scroll state 
const header = document.querySelector("[data-header]");

window.addEventListener("scroll", () => {
    header.classList[window.scrollY > 50 ? "add" : "remove"]("active");
});





// add to favorite 

const toggleBtns = document.querySelectorAll("[data-toggle-btn]");
toggleBtns.forEach(toggleBtn => {
    toggleBtn.addEventListener("click", () => {
        toggleBtn.classList.toggle("active");
    });
});

// dropdown menu 

const dropdowns = document.querySelector("[data-drop-down]");
const dropdownToggler = document.getElementById("dropdownToggle");

dropdownToggler.addEventListener("click", () => dropdowns.classList.toggle("active"));


// scroll progress 

let calcScrollValue = () => {
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");

    let pos = document.documentElement.scrollTop;
    let calcHeight = 
    document.documentElement.scrollHeight - document.documentElement.clientHeight;
   
    let scrollValue = Math.round((pos * 100) / calcHeight);

    if(pos > 100){
        scrollProgress.style.display = "grid";
    } else {
        scrollProgress.style.display = "none";
    }
    scrollProgress.addEventListener("click", () => {
        document.documentElement.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    scrollProgress.style.background = `conic-gradient(#0D3166 ${scrollValue}%, #C2C6CC ${scrollValue}% )`
};
window.onscroll = calcScrollValue;
window.onload = calcScrollValue;




//image scrolling
document.querySelectorAll(".view-property .pro-details .thumb .small-img .img-cover").forEach(images => {
    images.onclick = () => {
        const src = images.getAttribute("src");
        document.querySelector('.view-property .pro-details .thumb .big-img .img-cover').src = src;
    }
});


// faq down arrow click 

document.querySelectorAll(".FAQs .box-container .box h3").forEach(headings => {
    headings.onclick = () => {
        headings.parentElement.classList.toggle('active');
    }
});

// viewall property click 
const propertyview = document.querySelectorAll(".property .container .viewall-property");
const viewall = document.getElementById("viewAll");
const btnText = viewall.querySelector(".btn-text");
const arrowIcon = document.getElementById("arrowIcon"); 

viewall.addEventListener("click", () => {
    propertyview.forEach(view => {
        view.classList.toggle("active");
    });
    
    const isActive = Array.from(propertyview).some(view => view.classList.contains("active"));

    btnText.textContent = isActive ? "View Less" : "View More";

    arrowIcon.textContent = isActive ? "keyboard_arrow_up" : "keyboard_arrow_down";
});


