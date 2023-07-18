// *****************FIXED NAV***************

const navbar = document.querySelector(".navbar");

window.addEventListener("scroll", () => {
    const scrollHeight = window.pageYOffset;
    // const navHeight = navbar.getBoundingClientRect().height;

    if(scrollHeight > 0 ) {
        navbar.classList.add("fixed-nav");
     
    } else {
        navbar.classList.remove("fixed-nav");
    }
})
//  ======================TOGGLE NAV==========================
const toggleBtn = document.querySelector(".toggle"),
      closeCartBtn = document.querySelector(".close-nav"), 
      navDOM = document.querySelector(".navbar-details"),
      navBarOverlay = document.querySelector(".navbar-overlay");

toggleBtn.addEventListener("click", () => {
    navBarOverlay.classList.add("transparentBcg");
    navDOM.classList.add("showNav"); 
  });
  
  closeCartBtn.addEventListener("click", () => {
navBarOverlay.classList.remove("transparentBcg");
navDOM.classList.remove("showNav"); 
});

// =========================ACORDION=========================
const questions= document.querySelectorAll(".question"); 

questions.forEach((question) => {
const btn= question.querySelector(".question-btn"); 

     btn.addEventListener("click", () => {
      questions.forEach((item) => {
        if(item !== question) {
           item.classList.remove("show-text");
        }
      });
      question.classList.toggle("show-text");

     });
     });
// =====================toggle application form===============
const applyBtns = document.querySelectorAll(".apply-btn"),
      closeFormBtn = document.querySelector(".close-form"),
     application = document.querySelector(".application");

     applyBtns.forEach((applyBtn) => {
      applyBtn.addEventListener("click", () => {
        application.classList.add("application-show"); 
      });
     })
     closeFormBtn.addEventListener("click", () => {
      application.classList.remove("application-show"); 
     })
  // =========================COPYRIGHT DATE=========================
     const date = document.getElementById("date");
     date.innerHTML = new Date().getFullYear();
// =========================ANIMATION ON SCROLL=========================
AOS.init({
  offSet:400,
  duration:1000
});

