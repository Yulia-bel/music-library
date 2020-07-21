
$(document).ready(function() {

  $("#searchbar").on('keypress', function(e) {


    if(e.which == 13) {
      let search = $("#searchbar").val();
  
    e.preventDefault();
    console.log(search);
    
    $.ajax({
      url: "search.php",
      method: "GET",
      data: {search:search},
      success: function(data) {
        console.log(data);
        let response = JSON.parse(data);
        let results = response.results;
  
        console.log(results)
  
  
        $("#card_container").empty();
  
        for (let result of results) {
          $("#card_container").append(
            `
            <div class="card m-2">
              <img src="${result.artworkUrl100}" class="card-img-top" alt="...">
              <div class="card-body">
                  <h5 class="card-title">${result.artistName}</h5>
                  <p class="card-text">${result.trackCensoredName}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
            `
          )
         }
       }
     })
    } 
  })





});