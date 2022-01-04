const menu = document.querySelector('.menuBurger')
//console.log(menu)
const ligne = document.querySelector('#burger')
const ligneHaut = ligne.querySelector('.ligneH')
const ligneMil = ligne.querySelector('.ligneM')
const ligneBas = ligne.querySelector('.ligneB')
const liens = document.querySelectorAll('.menuBurger .containerMenuBurger .lienMenuBurger')

ligne.addEventListener('click',()=>{
    menu.classList.toggle('open')
    ligneHaut.classList.toggle('haut')
    ligneMil.classList.toggle('milieu')
    ligneBas.classList.toggle('bas')
})
document.addEventListener('scroll', noScroll);

liens.forEach(lien =>{
    lien.addEventListener('click',()=>{
        menu.classList.remove('open')
        ligneHaut.classList.remove('haut')
    ligneMil.classList.remove('milieu')
    ligneBas.classList.remove('bas')
    })
})