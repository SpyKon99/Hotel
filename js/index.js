function search(){
    let searchText = $("#searchText").val();
    $.ajax({
        method: "POST",
        url: "searchResult.php",
        data: {
            searchText
        },
        success: function(data) {
            window.location.href = "searchResult.php?" + searchText;
        }, 
        error: function(xhr, status, error) {
            console.error(xhr);
        }

    });
}
