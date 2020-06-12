<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="index.js"></script>
    <title>Document</title>
  </head>
  <body>
    <div class="box">
    <div class="container center headbox">
      <h2>Green Library Books</h2>
      <input type="text" id="searchstr" onkeyup="search()">
    </div>
    <div class="container-fluid">
      <div class="contents">
        <div class="tank">
          <div id="folder_table" class="table-responsive"></div>
        </div>
    </div>
    </div>
    <script>
      function search() {
        var searchstr = document.getElementById("searchstr").value;
        console.log(searchstr);
        var action = "search";
        $.ajax({
          url: "action.php",
          method: "POST",
          data: { action: action, str: searchstr },
          success: function (data) {
          $("#folder_table").html(data);
          },
        });
      }
    </script>
  </body>
</html>
