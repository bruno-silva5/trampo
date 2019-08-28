var servicesBtn = document.querySelector("#services-btn");
var myAccountBtn = document.querySelector("#myAccount-btn");
var configBtn = document.querySelector("#config-btn");
var helpBtn = document.querySelector("#help-btn");
var logoutBtn = document.querySelector("#logout-btn");

//modal!!!!!!!!!!!!!!!!!

var modal = document.querySelector(".modal");
var mainContent = document.getElementsByClassName("mdl-layout")[0];
var btnClose = document.querySelector(".close-modal");


servicesBtn.onclick = function() {
    changePage();
    servicesBtn.classList.add("active-menu-link");
    document.querySelector(".mdl-layout__tab-bar-container").style.display = "flex";
    document.querySelector(".section-page-services").style.display = "block";
}

myAccountBtn.onclick = function() {
    changePage();
    myAccountBtn.classList.add("active-menu-link");
    document.querySelector(".section-page-myAccount").style.display = "block";
};

configBtn.onclick = function() {
    changePage();
    configBtn.classList.add("active-menu-link");
    document.querySelector(".section-page-configuration").style.display = "block";
}

helpBtn.onclick = function() {
    changePage();
    helpBtn.classList.add("active-menu-link");
    document.querySelector(".section-page-help").style.display = "block";
}

// modal!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
var modalAccount = document.querySelector(".modal-account");
var closeModalAccount = document.querySelector(".close-modalAccount");
var btnModalAccount = document.querySelector(".btn-modal-account");

function toggleModal() {
    mainContent.classList.toggle("blur");
    modal.classList.toggle("show-modal");
}

function toggleModalAccount() {
    mainContent.classList.toggle("blur");
    modalAccount.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target == modal) {
        toggleModal();
    } else if (event.target == modalAccount) {
        toggleModalAccount();
    }
}

logoutBtn.addEventListener("click", toggleModal);
btnClose.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

btnModalAccount.addEventListener("click", toggleModalAccount);
closeModalAccount.addEventListener("click", toggleModalAccount);


function removeActiveLinks() {
    var links = document.getElementsByClassName("mdl-navigation__link");
    for (let i = 0; i < links.length; i++) {
        links[i].classList.remove("active-menu-link");
    }
}

function removeTabLayout() {
    document.querySelector(".mdl-layout__tab-bar-container").style.display = "none";
}

function changePage() {
    removeTabLayout();
    removeActiveLinks();
    var pages = document.getElementsByClassName("section-page");
    for (let i = 0; i < pages.length; i++) {
        pages[i].style.display = "none";
    }
}

var inputNewPassword = document.getElementById("input-newPassword");
var inputConfirmPassword = document.getElementById("input-confirmPassword");
var txtConfirmPassword = document.getElementById("txt_confirm_password");

function checkPassword() {
    if (inputNewPassword.value != inputConfirmPassword.value) {
        txtConfirmPassword.classList.add("is-invalid");
    } else {
        txtConfirmPassword.classList.remove("is-invalid");
    }
}

inputNewPassword.onchange = checkPassword;
inputConfirmPassword.onkeyup = checkPassword;