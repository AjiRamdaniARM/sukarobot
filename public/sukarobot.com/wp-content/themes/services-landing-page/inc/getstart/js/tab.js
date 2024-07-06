function services_landing_page_open_tab(evt, cityName) {
    var services_landing_page_i, services_landing_page_tabcontent, services_landing_page_tablinks;
    services_landing_page_tabcontent = document.getElementsByClassName("tabcontent");
    for (services_landing_page_i = 0; services_landing_page_i < services_landing_page_tabcontent.length; services_landing_page_i++) {
        services_landing_page_tabcontent[services_landing_page_i].style.display = "none";
    }
    services_landing_page_tablinks = document.getElementsByClassName("tablinks");
    for (services_landing_page_i = 0; services_landing_page_i < services_landing_page_tablinks.length; services_landing_page_i++) {
        services_landing_page_tablinks[services_landing_page_i].className = services_landing_page_tablinks[services_landing_page_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});