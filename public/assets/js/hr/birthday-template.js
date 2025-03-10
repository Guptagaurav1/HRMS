$("#btnSave").click(function() {
    html2canvas($("#specific"), {
        onrendered: function(canvas) {
            theCanvas = canvas;
            Canvas2Image.saveAsPNG(canvas);
        }
    });
});