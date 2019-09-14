var servicesBtn = document.querySelector("#services-btn");
var myAccountBtn = document.querySelector("#myAccount-btn");
var configBtn = document.querySelector("#config-btn");
var workBtn = document.querySelector("#work-btn");
var logoutBtn = document.querySelector("#logout-btn");

var modal = document.querySelector(".modal");
var mainContent = document.getElementsByClassName("mdl-layout")[0];
var btnClose = document.querySelector(".close-modal");


servicesBtn.onclick = function() {
    changePage();
    document.querySelector("#tab-hire").href = "#fixed-tab-1";
    document.querySelector("#tab-progress").href = "#fixed-tab-2";
    document.querySelector("#fixed-tab-1").classList.add("is-active");
    document.querySelector("#tab-progress").classList.remove("is-active");
    document.querySelector("#tab-hire").classList.add("is-active");
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

workBtn.onclick = function() {
    changePage();
    document.querySelector(".mdl-layout__tab-bar-container").style.display = "flex";
    document.querySelector("#tab-hire").href = "#fixed-tab-3";
    document.querySelector("#tab-progress").href = "#fixed-tab-4";
    workBtn.classList.add("active-menu-link");
    document.querySelector(".section-page-work").style.display = "block";
    document.querySelector("#tab-progress").classList.remove("is-active");
    document.querySelector("#tab-hire").classList.add("is-active");
    document.querySelector("#fixed-tab-3").classList.add("is-active");
}

var modalDeleteAccount = document.querySelector(".modal-deleteAccount");
var closeModalDeleteAccount = document.querySelector(".close-modalDeleteAccount");
var btnModalDeleteAccount = document.querySelector(".btn-modalDeleteAccount");

var modalChangePassword = document.querySelector(".modal-changePassword")
var closeChangePassword = document.querySelector(".close-changePassword")
var btnChangePassword = document.querySelector(".btn-modal-changePassword");

var modalSavedChanges = document.querySelector(".modal-savedChanges");
var closeSavedChanges = document.querySelector(".close-modal-savedChanges");


function toggleModal() {
    mainContent.classList.toggle("blur");
    modal.classList.toggle("show-modal");
}

function toggleModalDeleteAccount() {
    mainContent.classList.toggle("blur");
    modalDeleteAccount.classList.toggle("show-modal");
}

function toggleModalChangePassword() {
    mainContent.classList.toggle("blur");
    modalChangePassword.classList.toggle("show-modal");
}

function toggleModalSavedChanges() {
    mainContent.classList.toggle("blur");
    modalSavedChanges.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target == modal) {
        toggleModal();
    } else if (event.target == modalDeleteAccount) {
        toggleModalDeleteAccount();
    } else if (event.target == modalChangePassword) {
        toggleModalChangePassword();
    } else if (event.target == modalSavedChanges) {
        toggleModalSavedChanges();
    }
}

logoutBtn.addEventListener("click", toggleModal);
btnClose.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

btnModalDeleteAccount.addEventListener("click", toggleModalDeleteAccount);
closeModalDeleteAccount.addEventListener("click", toggleModalDeleteAccount);

btnChangePassword.addEventListener("click", toggleModalChangePassword);
closeChangePassword.addEventListener("click", toggleModalChangePassword);

closeSavedChanges.addEventListener("click", toggleModalSavedChanges);

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

$(document).ready(function() {
    $('#input-cpf').mask('000.000.000-00', { reverse: true });
    $('.input-date').mask('00/00/0000', { reverse: true });
    $('#input-cep').mask('00000-000', { reverse: true });
    $('#input-phone_number').mask('(00) 00000-0000');
});