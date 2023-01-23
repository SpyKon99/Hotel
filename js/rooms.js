
function book(id) {
    var roomId = id;
    console.log(id);
    $.ajax({
        method: "POST",
        url: "room.php",
        data: {
            roomId
        },
        success: function(data) {
            window.location.href = "room.php?id=" + roomId;
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }

    });
}