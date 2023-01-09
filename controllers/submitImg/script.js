
$(document).ready(function (e) {
    $("#attactFile").on('submit',(function(e) {
      e.preventDefault();
      $.ajax({
        url: "ajax_php_file.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
          if (data == "uploaded") {

          }else{
            alert(data);
          }
        }
      });
    }));

});

function cancelRoom(){
  window.location.href = "cancelRoom.php";
}

function submitRoom(){
  var room_id = document.getElementById('room_id').value;
  var room_type = document.getElementById('room_type').value;
  var room_rate = document.getElementById('room_rate').value;
  var room_name = document.getElementById('room_name').value;
  var max_per = document.getElementById('max_per').value;
  var numberof_rooms = document.getElementById('numberof_rooms').value;

  if (room_name == "") {
    $("#error-msg").html("***** Please fill up the room name! *****");
  }else if (room_rate == "" && room_rate <= 0) {
    $("#error-msg").html("****** Please fill exact room rate! *****");
  }else if (max_per == "" && max_per <= 0) {
    $("#error-msg").html("****** Please fill maximum guest! *****");
  }else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","submit_newroom.php?room_id="+room_id+"&room_name="+room_name+"&room_type="+room_type+"&room_rate="+room_rate+"&max_per="+max_per+"&numberof_rooms="+numberof_rooms,false);
    xmlhttp.send(null);
    var notify =xmlhttp.responseText;


    if (notify == "created") {
      document.getElementById('alert-success').innerHTML = '<strong>Succes: </strong> New room has been created...';
   $('#alertSuccess').modal('show');
    window.location.href = "room.php";
    }else{
      alert(notify);
      $("#error-msg").load("****** There's a problem with server, please contact the IT support! *****");
    }

  }

}
