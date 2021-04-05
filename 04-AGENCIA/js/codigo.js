const nav = document.querySelector('.header__nav');

function cambioNavScroll(){
    // console.log(window.pageYOffset);
    if(window.pageYOffset > 0){
        nav.classList.add('active');
    }
    else{
        nav.classList.remove('active');
    }
}

window.addEventListener('scroll', cambioNavScroll);

