//Remonter en haut de page
let mybutton = document.getElementById("btn-back-to-top");

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

//header menu

const menu = document.querySelector('.menu')

const menuBtn = document.querySelector('.menuBtn')

menuBtn.addEventListener('click', () => {
    if(menu.classList.contains('nav')){
        menu.classList.remove('nav')
        initMenu()
    }else{
        menu.classList.add('nav')
    }

    console.log("click")
})

//