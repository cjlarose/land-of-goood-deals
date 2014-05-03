// http://www.webdesignermag.co.uk/tutorials/use-css-to-create-stylish-circular-navigation/
(function(){

    $(document).ready(function() {
        var $button = $('#button'),
        $wrapper = $('.nav-wrapper');
        var open = false;

        //open and close menu when the button is clicked
        $button.on('click', function() {
          var $this = $(this);
          if(!open){
            $(this).text("Close");
            $wrapper.addClass('opened-nav');
          }
          else{
            $(this).text("Menu");
            $wrapper.removeClass('opened-nav');
          }
          open = !open;
        });

    });

})();
