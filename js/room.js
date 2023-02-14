function book(id,user, price){
    let pricePerStay = price; 
    let userid = user;
    let roomid = id; 
    let checkin = $("#checkin").val();
    let checkout = $("#checkout").val();
    let numberofguests = $("#numberofguests").val();
    let ccheckin = new Date(document.getElementById("checkin").value);
    let ccheckout = new Date(document.getElementById("checkout").value);
    let numberofstays = parseInt((ccheckout - ccheckin) / (24 * 3600 * 1000));
    let totalprice = pricePerStay * numberofstays;
    
    if(numberofstays<=0){
      alert("Παρακαλω επιλεξτε σωστες ημερομηνιες");
    } else if(checkin == "" || checkout=="" || numberofguests==null){
        alert("Παρακαλω επιλεξτε ημερομηνιες ή αριθμο ατομων!");
    } else {
        // alert(userid);
        // alert(roomid);
        // alert(checkin);
        // alert(checkout);
        // alert(numberofguests);
        // alert(numberofstays);
        // alert(totalprice);

        $.post(
            "http://localhost/Unipihotel/api/bookings/book.php",
            {
                userid: userid,
                roomid: roomid,
                checkin: checkin,
                checkout: checkout,
                numberofguests: numberofguests,
                numberofstays: numberofstays,
                totalprice: totalprice 
            },
            function (response) {
                console.log(response);
                alert(response);
                let redirect = response.substring(10,14)
                // alert (redirect);
                if (redirect == "true"){
                  $.ajax({
                    method: "POST",
                    url: "cart.php",
                    data: {
                        roomid
                    },
                    success: function(data) {
                        window.location.href = "cart.php?id=" + roomid;
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
              
                });
                }
            }  
        )
    }

       
}

function complete(room, user){
    let roomid = room;
    let userid = user;
    
    $.get(
      "http://localhost/Unipihotel/api/bookings/update.php",
      {
          userid: userid,
          roomid: roomid
      },
      function (response) {
          console.log(response);
          alert(response);
          window.location.href = "index.php";
      }  
  );
  
} 

(function () {
  

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())