// (function ($){

(function($) {
   Drupal.behaviors.ddamTheme = {
      attach: function(context, settings) {

        console.log( "collapsibles!!" ); //debug
        $('.p-collapsible').each(function(){

            var s = $(this).find('.p-collapsible-content');
            var m = $(this);

            var minH = s.css('min-height'); // min must be set in css "min-height"
            var truH = s[0].scrollHeight;   // true element height (overflowed)
            var eleH = s.height() + "px";   // height from css
            var maxH = truH + 20; maxH = maxH + "px" // max height to open (plus margin)
            truH = truH + "px";

            console.log( "minH:" + minH + " eleH:" + eleH  + " truH:" + truH + " maxH:" + maxH ); //debug

            if ( parseInt(truH) > parseInt(minH) ) {

               // set initial height if not, or slide init open

               if ( eleH != minH ) s.css("height", minH );

               // create toogle menu
               var a = $('<a href="#" class="p-collapsible-toogle"><span class="angle-down"></span> more</a>');
               a.css("display", "block" );
               m.append(a);

               // toogle function
               var open = false;
               a.click(function(){
                  if ( open == true ){
                     s.animate({"height": minH}, {duration: "slow" });
                     a.html('<span class="angle-down"></span> more');
                     open = false;
                  } else {
                     s.animate({"height": maxH}, {duration: "slow" });
                     a.html('<span class="angle-up"></span> close');
                     open = true;
                  }
               });
            };
        });

      }
   }
})(jQuery); 
