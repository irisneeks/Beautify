var source;
    function init() {
        source = document.getElementById('image').src;
        var imgObjw = document.getElementById('image');
        var imgObj1w = document.getElementById('image1');
        imgObj1w.width = imgObjw.width;
        imgObj1w.height = imgObjw.height;
        /*var imgObj = document.getElementById('image');
        var imgObj1 = document.getElementById('image1');
        var opacity =  $("#slider").slider("value");
        //var opacity = 25;
        imgObj.src = imageStuff(imgObj, imgObj1, opacity);*/
    }
    function revert() {
        document.getElementById('image').src = source;
    }
    $(function() {
        $( "#slider" ).slider({
            value:25,
            min: 0,
            max: 100,
            step: 1,
            slide: function( event, ui ) {
                $( "#amount" ).val( ui.value );
                /*//document.getElementById('image').src = source;
                var imgObj = document.getElementById('image');
                var imgObj1 = document.getElementById('image1');
                var opacity =  $("#slider").slider("value");
                //var opacity = 25;
                imgObj.src = imageStuff(imgObj,o imgObj1, opacity);*/
            }
        });
        $( "#amount" ).val($( "#slider" ).slider( "value" ) );
    });
    $(document).ready(function(){
        $('#toggleDesaturate').click(function(){
            //document.getElementById('image').src = source;
            var imgObj1 = document.getElementById('image1');
            var imgObj = document.getElementById('image');
            imgObj1.width = imgObj.width;
            imgObj1.height = imgObj.height;
            var opacity =  $("#slider").slider("value");
            //var opacity = 25;
            imgObj.src = imageStuff(imgObj, imgObj1, opacity);
            $("#download").attr('href', document.getElementById('image').src);
            $("a[download='http://www.google.com/']").attr('download', document.getElementById('image').src);
        });
        $('#reload').click(function(){
            document.getElementById('image').src = source;
        });
    });
    function imageStuff(imgObj, imgObj1, opacity)
    {
        var canvas = document.createElement('canvas');
        var canvasContext = canvas.getContext('2d');
        
        var stuff = document.createElement('canvas');
        var stuffContext = stuff.getContext('2d');
        
        var imgW = imgObj.width;
        var imgH = imgObj.height;
        
        var imgW1 = imgObj1.width;
        var imgH1 = imgObj1.height;
        
        canvas.width = imgW;
        canvas.height = imgH;
        
        stuff.width = imgW;
        stuff.height = imgH;
        
        canvasContext.drawImage(imgObj, 0, 0);
        stuffContext.drawImage(imgObj1, 0, 0, imgW, imgH);
        
        //stuff.width = imgW;
        //stuff.width = imgH;
        
        var imgPixels = canvasContext.getImageData(0, 0, imgW, imgH);
        var imgPixels1 = stuffContext.getImageData(0, 0, imgW, imgH);
        
        for(var y = 0; y < imgPixels.height; y++){
            for(var x = 0; x < imgPixels.width; x++){
                var i = (y * 4) * imgPixels.width + x * 4;
                var r1 = imgPixels.data[i];
                var g1 = imgPixels.data[i + 1];
                var b1 = imgPixels.data[i + 2];
                var u = (y * 4) * imgPixels1.width + x * 4;
                var r2 = imgPixels1.data[u];
                var g2 = imgPixels1.data[u + 1];
                var b2 = imgPixels1.data[u + 2];
                var rfinal = r2*(opacity/100)+r1*(100-opacity)/100;
                var gfinal = g2*(opacity/100)+g1*(100-opacity)/100;
                var bfinal = b2*(opacity/100)+b1*(100-opacity)/100;
                imgPixels.data[i] = rfinal;
                imgPixels.data[i + 1] = gfinal;
                imgPixels.data[i + 2] = bfinal;
            }
        }
        
        canvasContext.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
        return canvas.toDataURL();
    }      
    
    