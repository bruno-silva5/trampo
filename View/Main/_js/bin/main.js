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

//init select && characterCounter
$(document).ready(function () {
    $('select').formSelect();
    $('#service-description').characterCounter();
});

//init collapsible
var elem_collapsible = document.querySelectorAll('.collapsible');
var instances_collapsible = M.Collapsible.init(elem_collapsible);

//search bar section-hire

$("#hire_search").keyup(function () {
    var search = $(this).val();

    if (search == "") {
        $(".result").html('');
        $(".result").hide();
        $(".hire-title").html("Serviços Populares");
        $(".popular-services").show();
    } else {
        $(".hire-title").html("Sugestões");
        $(".popular-services").hide();
        if (search.length >= 2) {
            $.ajax({
                type: 'GET',
                url: 'http://apps.diogomachado.com/api-profissoes/v1?callback=CALLBACK_JSONP&s=' + search,
                success: function (data) {
                    if (Object.keys(data).length > 0) {
                        $(".result").html(''); //clear before insert
                        $.each(data, function (key, value) {
                            $(".result").append("<a href='../requestService?professional=" + value + "' id='service_suggestion'><h5>" + value + "</h5></a>");
                        });
                        $(".result").show();
                    }
                }, statusCode: {
                    404: function () {
                        console.error('Não conseguimos buscar as profissões');
                    },
                    500: function () {
                        console.error('Erro ao buscar profissões no servidor');
                    }
                },
                dataType: 'jsonp'
            })
        }
    }
})


//add shadow on navbar when scroll
var navbar = document.querySelector(".nav-extended");

if(navbar.classList.contains("z-depth-0")) {
    window.onscroll = function() {
        if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            navbar.classList.add("z-depth-1");
            navbar.classList.remove("z-depth-0");
        } else {
            navbar.classList.add("z-depth-0");
        }
    }
}

//register service
$("#form-requestService").submit(function (event) {
    event.preventDefault();
    var professional = $("#professional").val();
    var time_remaining = $("#time-remaining").val();
    var service_title = $("#service-title").val();
    var service_description = $("#service-description").val();
    var submit = $("#submit").val();
    $("#form-message").load("../../../Controller/cadastrarService.php", {
        professional: professional,
        time_remaining:  time_remaining,
        service_title: service_title,
        service_description: service_description,
        submit: submit
    });
});

try {
    
    
} catch (error) {
    
}