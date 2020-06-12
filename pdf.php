<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>pdf</title>
    <style>
      .pdfModal {
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0px;
        left: 0px;
      }
      .box2 {
        width: 100%;
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div class="pdfModal">
      <div class="container-fluid box2" id="pdfbox">
      <iframe id="frame" src="" frameborder="0" width="100%" height="100%"></iframe>
      </div>
    </div>
    <script>
      window.onload = function(){
        var val = localStorage.getItem('datapath');
        document.getElementById("frame").setAttribute("src", val);
        }
    </script>
  </body>
</html>


