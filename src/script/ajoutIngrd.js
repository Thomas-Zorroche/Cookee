async function displayIngrdThumbnail()
{
    // Retrieve user input from text input field (english name)
    var userIngrdName = document.getElementById("nom-english").value;

    // Check whether userIngrdName is arleady inside the database
    // If so, do note make API call
    // TODO

    // API Call
    var correctIngrdName = getIngrdName(userIngrdName);

    correctIngrdName.then(function(result) {
        var containerImg = document.getElementById("ingrd-img-cont");
        containerImg.innerHTML = "";

        var resultsCount = result.results.length;
        for (let i = 0; i < resultsCount; i++) {
            // Retrieve name 
            var nameIngrd = result.results[i].image;
            // Get complete url with ingredient name
            var url = getIngrdImageUrl(nameIngrd);
            // Insert images inside HTML
            containerImg.insertAdjacentHTML('beforeend', 
            "<img class='ingrd-img' src='" + url + "'>");
        }
    })
}