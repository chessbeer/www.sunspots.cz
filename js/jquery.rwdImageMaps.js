/*
* rwdImageMaps jQuery plugin v1.5
*
* Allows image maps to be used in a responsive design by recalculating the area coordinates to match the actual image size on load and window.resize
*
* Copyright (c) 2013 Matt Stow
* https://github.com/stowball/jQuery-rwdImageMaps
* http://mattstow.com
* Licensed under the MIT license
*/
;(function($) {
	$.fn.rwdImageMaps = function() {
		var $img = this;
		
		var rwdImageMap = function() {
			$img.each(function() {
				if (typeof($(this).attr('usemap')) == 'undefined')
					return;
				
				var that = this,
					$that = $(that);
				
				// Since WebKit doesn't know the height until after the image has loaded, perform everything in an onload copy
				$('<img />').load(function() {
					var attrW = 'width',
						attrH = 'height',
						w = $that.attr(attrW),
						h = $that.attr(attrH);
					
					if (!w || !h) {
						var temp = new Image();
						temp.src = $that.attr('src');
						if (!w)
							w = temp.width;
						if (!h)
							h = temp.height;
					}
          
          
          var left_top = new Array(2);
					var coordinates = new Array(100);
 
  for (var i = 0; i < 100; i++) {
    coordinates[i] = new Array(4);
  }
          var j = 0;
					var wPercent = $that.width()/100,
						hPercent = $that.height()/100,
						map = $that.attr('usemap').replace('#', ''),
						c = 'coords';
            xx = 'style';
            xy = 'top';
          
          var imgos = $that.attr('jay'),
          img_style  = 'style';
         
      function draw(j) {
         var x = j;
  var canvas = document.getElementById('canvas');
      canvas.setAttribute('width', '700');
canvas.setAttribute('height', '500');
 
var img = document.getElementById('class_image'),
style = window.getComputedStyle(img),
    top = style.getPropertyValue('top');
    var top2 = parseInt(top.replace('px', ''));
    left = style.getPropertyValue('left');
    var left2 = parseInt(left.replace('px', ''));

      width = style.getPropertyValue('width');
    var width2 = parseInt(width.replace('px', ''));
      height = style.getPropertyValue('height');
    var height2 = parseInt(height.replace('px', ''));
    
  if (canvas.getContext) {
    var ctx = canvas.getContext('2d');

 
      ctx.fillStyle = "#FF0000";
      
      ctx.clearRect(0, 0, 700, 500);
 
 if (height2 != width2){
       for (var i = 0; i < x; i++) {
      
   
      ctx.fillRect((coordinates[i][0]+left2),(coordinates[i][1]+top2),(coordinates[i][2]-coordinates[i][0]),(coordinates[i][3]-coordinates[i][1]));
  }
  }
}
}
          
         
					
					$('map[name="' + map + '"]').find('a').each(function() {
						var $this = $(this);
						if (!$this.data(c))
							$this.data(c, $this.attr(c));
						
						var coords = $this.data(c).split(','),
							coordsPercent = new Array(coords.length);
						
						for (var i = 0; i < coordsPercent.length; ++i) {
							if (i % 2 === 0) {
								coordsPercent[i] = parseInt(((coords[i]/w)*100)*wPercent);
               
							}else{
								coordsPercent[i] = parseInt(((coords[i]/h)*100)*hPercent);
						}
            coordinates[j][i] = coordsPercent[i];
            }
            j++;
            
						$this.attr(c, coordsPercent.toString());
            
					});
          
          draw(j);
          
        
         
        
          
          
          $('div').find('#border').each(function() {
						var $this = $(this);
						if (!$this.data(xx))
							$this.data(xx, $this.attr(xx));
						
						var input = $this.data(xx);
            var datas = input.replace('px', '').replace('top:', '').replace('left:', '').replace('px', '').replace(/ /g, '');
             // document.write(datas + " krzple ");
            var datas2 =datas.split(';');
            //   document.write(datas2 + " krzple ");
             //  document.write(datas2[0] + " coye< "  + datas2[1] + " >>>>");
							datasPercent = new Array(datas2.length-1);
             //   document.write(datas2.length + " ok ");
           for (var i = 0; i < datasPercent.length; ++i) {
						//	document.write(i + " < " + datas2[i] + " > " + w + " ?? " + wPercent);
              if (i % 2 === 0)
                  
								datasPercent[i] = parseInt(((datas2[i]/w)*100)*wPercent);
							else
								datasPercent[i] = parseInt(((datas2[i]/h)*100)*hPercent);
						// document.write(datasPercent[i] + " CO ");
            }
            var style = "top: " + datasPercent[0] + "px; left: " + datasPercent[1] + "px;";
              //document.write(style + " kokot");
						$this.attr(xx, style.toString());
						
						
					});                                      
				}).attr('src', $that.attr('src'));
			});
		};
		$(window).resize(rwdImageMap).trigger('resize');
		
		return this;
	};
})(jQuery);