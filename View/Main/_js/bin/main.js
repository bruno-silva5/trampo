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
                            $(".result").append("<a href='../requestService?service_type="+value+"' id='service_suggestion'><h5>" + value + "</h5></a>");
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

try {
    var service_suggestion = document.querySelectorAll("#service_suggestion");
    for (let i = 0; i < array.length; i++) {
        service_suggestion[i].addEventListener('click', function() {
            document.querySelector(".search-service").style.display = "none";
            document.querySelector(".form-hire").style.display = "block";
        });
    }
} catch (error) {
    
}



