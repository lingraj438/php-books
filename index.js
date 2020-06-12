$(document).ready(function () {
  load_folder_list();
  function load_folder_list() {
    var action = "fetch";
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { action: action },
      success: function (data) {
        $("#folder_table").html(data);
      },
    });
  }
  $(document).on("click", ".open", function () {
    var folder_name = this.getAttribute("data-adr");
    var action = "open";
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { action: action, folder_name: folder_name },
      success: function (data) {
        $("#folder_table").html(data);
      },
    });
  });
  $(document).on("click", ".file", function () {
    var file_name = this.getAttribute("data-adr");
    localStorage.setItem("datapath", file_name);
    window.open("pdf.php");
  });
  $(document).on("click", ".back", function () {
    var str = this.getAttribute("data-adr");
    var res = str.split(",");
    var folder_name = res[0];
    var length = res[1];
    if (length == 1) {
      var action = "fetch";
    } else {
      var action = "open";
    }
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { action: action, folder_name: folder_name },
      success: function (data) {
        $("#folder_table").html(data);
      },
    });
  });
});
