
(function(){
  "use strict";


$(function ($) {

    //BG SLIDESHOW WITH ZOOM EFFECT
    $.mbBgndGallery.buildGallery({
                containment:"body",
                timer:1000,
                effTimer:15000,
                controls:false, 
                grayScale:false,
                shuffle:true,
                preserveWidth:false,
                preserveTop: true,
                effect:"zoom",
    //effect:{enter:{transform:"scale("+(1+ Math.random()*2)+")",opacity:0},exit:{transform:"scale("+(Math.random()*2)+")",opacity:0}},

                // If your server allow directory listing you can use:
                // (however this doesn't work locally on your computer)


                // else:

                 images:[
                  // "img/pizza-6.jpeg",
                  // "img/pizza-1.jpeg",
                 "img/background/new_bg_1.jpeg",
                 "img/background/new_bg_2.jpeg",
                 "img/background/new_bg_3.jpeg",
                 ],    

                onStart:function(){},
                onPause:function(){},
                onPlay:function(opt){},
                onChange:function(opt,idx){},
                onNext:function(opt){},
                onPrev:function(opt){}
            });


   
});
// $(function ($)  : ends

})();
