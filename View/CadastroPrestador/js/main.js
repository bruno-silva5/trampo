var currentTab = 0;
var x = document.getElementsByClassName("form-step");
var tabCompleted = [];
showTab(currentTab);

function showTab(n) {
    x[n].style.display = "flex";
    document.getElementsByClassName("step-number")[n].style.boxShadow = "0 3px 8px rgba(0,0,0,0.6)";
    tabCompleted[n] = true;

    if (n == 0) {
        document.getElementsByClassName("back-button")[0].style.visibility = "visible";
    }else {
        document.getElementsByClassName("back-button")[0].style.visibility = "hidden";
    }
    fixStepIndicator(n);
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step-number");
    var y = document.getElementsByClassName("line-step");
    for (i = n; i >= 0; i--) {
        x[i].style.background = "#003bfb";
        x[i].style.cursor = "pointer";
        if (i > 0) {
            y[i - 1].style.background = "#003bfb";
        }
    }
}

function goToTab(n) {
    if (n < currentTab || tabCompleted[n] == true) {
        x[currentTab].style.display = "none";
        document.getElementsByClassName("step-number")[currentTab].style.boxShadow = "none";
        x[n].style.display = "flex";
        document.getElementsByClassName("step-number")[n].style.boxShadow = "0 3px 8px rgba(0,0,0,0.6)";
        currentTab = n;
        if (n == 0) {
            document.getElementsByClassName("back-button")[0].style.visibility = "visible";
        } else {
            document.getElementsByClassName("back-button")[0].style.visibility = "hidden";
        }
    }
}

function next() {
    if (!validateForm()) return false;
    x[currentTab].style.display = "none";
    document.getElementsByClassName("step-number")[currentTab].style.boxShadow = "none";
    currentTab = currentTab + 1;
    if (currentTab >= x.length) {
        document.getElementById("form-register").submit();
        return false;
    }
    showTab(currentTab);


}

function validateForm() {
    var y, i, valid = true;
    y = x[currentTab].getElementsByClassName("mdl-textfield");

    for (i = 0; i < y.length; i++) {
        if (y[i].getElementsByTagName("input")[0].value == "" && !y[i].getElementsByTagName("input")[0].classList.contains("no-required") || y[i].getElementsByTagName("input")[0].type == "email") {
            x[currentTab].getElementsByClassName("mdl-textfield")[i].classList.add("is-invalid");
            valid = false;
            if(y[i].getElementsByTagName("input")[0].type == "email"){
                if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(y[i].getElementsByTagName("input")[0].value)){
                    valid = true;
                    x[currentTab].getElementsByClassName("mdl-textfield")[i].classList.remove("is-invalid");
                }else {
                    valid = false;
                }
            }
        }
    }

    return valid;
}

var password = document.getElementById("input-password"),
    confirm_password = document.getElementById("input-password-confirm"),
    txt_confirm_password = document.getElementById("txt-password-confirm");

function validatePassword() {
    if (password.value != confirm_password.value) {
        txt_confirm_password.classList.add("is-invalid");
    } else {
        txt_confirm_password.classList.remove("is-invalid");
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


function normalInput(input) {
    input.classList.remove("is-invalid");
}

document.getElementsByTagName("input").onkeyup = normalInput;