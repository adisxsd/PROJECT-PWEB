const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.Login-Link');
const registerLink = document.querySelector('.Register-Link');
const btnPopupLogin = document.querySelector('.btnLogin-popup');
const btnClose = document.querySelector('.icon-close');

    registerLink.addEventListener('click', ()=> {
        wrapper.classList.add('active');
    });

    loginLink.addEventListener('click', ()=> {
        wrapper.classList.remove('active');
    });

btnPopupLogin.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});

btnClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});

function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";  
    document.getElementById("main-content").style.marginLeft = "250px";
    document.getElementById("main").style.display="none";
  }
  
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";  
    document.getElementById("main").style.display="block";  
  }