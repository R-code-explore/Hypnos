let hotel = document.getElementById('select')

let suite1 = document.getElementById('suite_et1')
let suite2 = document.getElementById('suite_et2')
let suite3 = document.getElementById('suite_et3')
let suite4 = document.getElementById('suite_et4')
let select;
//Choix établissements + suite
function toggle(el){
    select = el.options[el.selectedIndex].value

    if(select == 'paris'){
        suite1.style.display = 'block'
        suite2.style.display = 'none'
        suite3.style.display = 'none'
        suite4.style.display = 'none'
    }
    else if(select == 'lyon'){
        suite1.style.display = 'none'
        suite2.style.display = 'block'
        suite3.style.display = 'none'
        suite4.style.display = 'none'
    }
    else if(select == 'nice'){
        suite1.style.display = 'none'
        suite2.style.display = 'none'
        suite3.style.display = 'block'
        suite4.style.display = 'none'
    }
    else if(select == 'mahon'){
        suite1.style.display = 'none'
        suite2.style.display = 'none'
        suite3.style.display = 'none'
        suite4.style.display = 'block'
    }
    else{
        suite1.style.display = 'none'
        suite2.style.display = 'none'
        suite3.style.display = 'none'
        suite4.style.display = 'none'
        select = null
    }
}

//

//vérification de la disponibilité des dates
let date1 = document.getElementById('date_start')
let date2 = document.getElementById('date_end')
let date = new Date()
let currentDate = date.getFullYear()+'-'+('0'+(date.getMonth()+1)).slice(-2)+'-'+('0'+date.getDate()).slice(-2);

let verifInfo = document.getElementById('dispo')
let bookBtn = document.querySelector('.bookBtn')

document.getElementById('bouton').addEventListener('click', () => {

    if(date2.value < date1.value){
        verifInfo.style.color = 'red'
        verifInfo.innerHTML = "Dates incorrects"
    }
    else if(currentDate > date1.value){
        verifInfo.style.color = 'red'
        verifInfo.innerHTML = "Dates incorrects"
    }
    else if(select == null){
        verifInfo.style.color = 'red'
        verifInfo.innerHTML = "Champ hotel vide"
    }
    else{
        verifInfo.style.color = "green"
        verifInfo.innerHTML = "Réservation disponible"
        bookBtn.style.display = "block";
    }
})