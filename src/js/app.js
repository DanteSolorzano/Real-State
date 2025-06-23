document.addEventListener('DOMContentLoaded', function() {

    eventListeners();

    darkMode();
});

function darkMode(){

    const ratherDarkMode = window.matchMedia('prefers-color-scheme: dark');
    //console.log(ratherDarkMode.matches);
    if(ratherDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');

    }

    ratherDarkMode.addEventListener('change', function(){
        if(ratherDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
    
        }
    })

    const buttonDarkMode = document.querySelector('.dark-mode-button');

    buttonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');

         //Para que el modo elegido se quede guardado en local-storage
         if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('modo-oscuro','true');
        } else {
            localStorage.setItem('modo-oscuro','false');
        }
    })

    //Obtenemos el modo del color actual
    if (localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

}

function eventListeners(){

    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegationResponsive);
}

function navegationResponsive(){
    const navegation = document.querySelector('.navbar');

    if(navegation.classList.contains('show')){
        navegation.classList.remove('show');
    } else{
        navegation.classList.add('show');

    }
}