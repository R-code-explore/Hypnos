const accountDoneForm = document.querySelector('.formLogin')
const accountNoneForm = document.querySelector('.formSingin')

function openAlreadyAccount(){
    if(!accountDoneForm.style.display == "block"){
        accountDoneForm.style.display = "block"
        accountNoneForm.style.display = "none"
    }else if(accountNoneForm.style.display = "block"){
        accountDoneForm.style.display = "block"
        accountNoneForm.style.display = "none"
    }
}

function openNotAccount(){
    if(!accountNoneForm.style.display == "block"){
        accountNoneForm.style.display = "block"
        accountDoneForm.style.display = "none"
    }else if(accountDoneForm.style.display = "block"){
        accountNoneForm.style.display = "block"
        accountDoneForm.style.display = "none"
    }
}