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