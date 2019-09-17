//init sideNav
var elem_sideNav = document.querySelector(".sidenav");
var instance_sideNav = M.Sidenav.init(elem_sideNav);


//init tabs
var elem_tabs = document.querySelector(".tabs");
var instance_tabs = M.Tabs.init(elem_tabs, {
    swipeable: true
});     

//init modal
var elem_modal = document.querySelectorAll('.modal');
var instance_modal = M.Modal.init(elem_modal);

//init select
$(document).ready(function () {
    $('select').formSelect();
});

//displaying tabs
var body = document.querySelector("body");

function showSection(sectionClass, liId, title) {
    //remove active links
    var lis = document.querySelector(".sidenav").querySelectorAll("li");
    for (let i = 0; i < lis.length; i++) {
        lis[i].classList.remove("active");
    }
    //display correct link
    document.querySelector(liId).classList.add("active");

    //hidden all sections
    var section = document.querySelectorAll("section");
    for (let i = 0; i < section.length; i++) {
        section[i].style.display = "none";
    }

    //display correct section
    document.querySelector(sectionClass).style.display = "block";

    //tabs
    let navContent = document.querySelector(".tabs");
    let main = document.querySelector('main');

    if (sectionClass != ".section-progress") {
        navContent.style.display = "none";
        main.style.paddingTop = "4em";
    } else {
        navContent.style.display = "flex";
        main.style.paddingTop = "8em";
    }

    //changes title
    document.querySelector(".brand-logo").innerHTML = title;
}



