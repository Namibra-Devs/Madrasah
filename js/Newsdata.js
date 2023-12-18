const reviews = [
    {
        title: "Data Science",
        text: "Data science is a rapidly evolving field that combines statistics, computer science, mathematics, and domain knowledge to extract insights from large datasets. These insights can then be used to solve real-world problems, make informed decisions, and create new products and services."
    },
    {
        title: "Software Engineering",
        text: "Software engineering is much like building a bridge, but instead of concrete and steel, it uses code and logic to build software applications. It's the branch of computer science that deals with the systematic application of scientific and engineering principles to the design, development, testing, deployment, maintenance, and evaluation of software."
    },
    {
        title: "Website Design",
        text: " Website design is a broad topic, so to give you the most relevant information, I need some more context! What specifically are you interested in about website design? Are you looking for: Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quod nisi nulla commodi nesciunt optio consequatur alias perferendis adipisci accusantium est dolorum consequuntur eos tempora, id officia repellendus earum. Sequi!"
    },
    {
        title: "Website Development",
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quod nisi nulla commodi nesciunt optio consequatur alias perferendis adipisci accusantium est dolorum consequuntur eos tempora, id officia repellendus earum. Sequi!"
    },
    {
        title: "Data Analysis",
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quod nisi nulla commodi nesciunt optio consequatur alias perferendis adipisci accusantium est dolorum consequuntur eos tempora, id officia repellendus earum. Sequi!"
    },
    {
        title: "Cloud Computing",
        text: "Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium quod nisi nulla commodi nesciunt optio consequatur alias perferendis adipisci accusantium est dolorum consequuntur eos tempora, id officia repellendus earum. Sequi!"
    }
]

const title = document.getElementById("blog-title");
const text = document.getElementById("blog-text");
const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");
   
let currentItem = 0; 

window.addEventListener("DOMContentLoaded", () => {
    showBlog(currentItem); 
})

let showBlog = (blog) => {
    const item = reviews[blog]; 
    title.textContent = item.title;
    text.textContent = item.text;
}
nextBtn.addEventListener("click", () => {
    currentItem++; 
    if(currentItem > reviews.length -1) {
        currentItem = 0;
    }
    showBlog(currentItem); 
})
prevBtn.addEventListener("click", () => {
    currentItem--; 
    if(currentItem < 0) {
        currentItem = reviews.length - 1;
    }
    showBlog(currentItem); 
})

const date = document.getElementById("blog-date");
const month = document.getElementById("blog-month");
const day = document.getElementById("blog-day");
day.innerHTML = new Date().getDate();
month.innerHTML = new Date().getMonth();
date.innerHTML = new Date().getUTCFullYear();