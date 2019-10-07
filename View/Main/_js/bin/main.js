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

try {

    var service_list = $(".section-hire .collection");
    var search_bar = $("#search-bar");
    var label_search_bar = $("#label-search-bar");

    $(search_bar).click(function () {
        if (!$(service_list).is(':visible')) {
            service_list.fadeIn();
        }
    });

    $(document).mouseup(function (e) {
        var container = service_list;

        if (!container.is(e.target) && container.has(e.target).length === 0 && !search_bar.is(e.target) && !label_search_bar.is(e.target)) {
            container.fadeOut();
        }
    });

    $("#search-bar").keyup(function () {
        var search_value = $("#search-bar").val();
        $.post("../../../Controller/searchOccupation.php", {
            suggestion: search_value
        }, function (data) {
            $(service_list).html(data);
        });
    });

} catch (error) {

}


//add shadow on navbar when scroll
var navbar = document.querySelector(".nav-extended");

if (navbar.classList.contains("z-depth-0")) {
    window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
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
    var id_occupation_subcategory = $("#id_occupation_subcategory").val();
    var time_remaining = $("#time-remaining").val();
    var service_title = $("#service-title").val();
    var service_description = $("#service-description").val();
    var submit = $("#submit-requestService").val();
    var is_visible;
    if ($("#visible-agreement").is(":checked")) {
        is_visible = true;
    } else {
        is_visible = false;
    }
    $("#form-message").load("../../../Controller/cadastrarService.php", {
        id_occupation_subcategory: id_occupation_subcategory,
        time_remaining: time_remaining,
        service_title: service_title,
        service_description: service_description,
        is_visible: is_visible,
        submit: submit
    });
});


//become worker
$("#form-becomeWorker").submit(function (event) {
    event.preventDefault();
    var select_occupation = $("#select-occupation").val();
    var work_info = $("#work-info").val();
    var work_agreement;
    var submit = $("#submit-becomeWorker").val();
    if ($("#work-agreement").is(":checked")) {
        work_agreement = true;
    } else {
        work_agreement = false;
    }
    $("#message-becomeWorker").load("../../../Controller/becomeWorker.php", {
        select_occupation: select_occupation,
        work_info: work_info,
        work_agreement: work_agreement,
        submit: submit
    });
});

//chat list conversation
try {

    $(document).ready(function () {
        var id_user = $("#id_user").val();

        function loadConversations() {
            $("section.chat .conversations").load("../../../Controller/chatList.php", {
                id_user: id_user
            });
        }

        loadConversations();
        setInterval(function () { loadConversations(); }, 2000);

    });


} catch (error) {

}

//chat conversation

try {
    $(document).ready(function () {
        var id_user_to = $("#id_user_to").val();
        var id_user_from = $("#id_user_from").val();
        var id_conversation = $("#id_conversation").val();

        function loadMessages() {
            $("section.chat .conversation .conversation-content").load("../../../Controller/chatMessage.php", {
                id_user_to: id_user_to,
                id_user_from: id_user_from,
                id_conversation: id_conversation
            });
        }

        loadMessages();
        setInterval(function () { loadMessages() }, 100);

    });
} catch (error) {

}

//chat send message

try {
    $(".conversation #form-chat").submit(function(event) {
        event.preventDefault();
        var id_user_to = $("#id_user_to").val();
        var id_user_from = $("#id_user_from").val();
        var id_conversation = $("#id_conversation").val();
        var text_message = $("#text-message").val();
        var new_message = $("#new_message").val();
        

        $("#form-chat-result").load("../../../Controller/chatSend.php", {
            id_user_to: id_user_to,
            id_user_from: id_user_from,
            id_conversation: id_conversation,
            text_message: text_message,
            new_message: new_message
        });

    });

} catch (error) {

}


