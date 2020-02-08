/*
* This is the Javascript file that is called before the </body>
* */

// Javascript Functions

$(function() {
    $(document).on('click','.open-search a', function(e){
        e.preventDefault();
        $('.search-form-container').slideToggle(300);
    });
});