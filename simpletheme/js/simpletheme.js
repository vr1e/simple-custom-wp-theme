// javascript functions
jQuery(document).ready(function($) {

    $(document).on('click','.open-search > a', function(e) {
        // console.log('CLICKED ON THE OPEN SEARCH');
        e.preventDefault();
        $('.search-form-container').slideToggle(300);
    });
});