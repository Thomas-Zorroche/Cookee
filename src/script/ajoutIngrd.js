/**
 * Add img into html code with image provide by user input field.
 * Call on Preview btn click.
 */
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
            "<img class='ingrd-img' src='" + url + "' onclick='selectIngrd(event)'>");
        }
    })
}

/**
 * Select an image as the one to be used for the ingredient
 * Call on Igrd img thumbnail click.
 */
function selectIngrd(e)
{
    var imgNode = e.target || e.srcElement;
    var containerImg = imgNode.parentNode;

    // Get all img nodes and disable unselect all
    var nodes = containerImg.getElementsByTagName("img");
    var nodesArray = Array.prototype.slice.call(nodes);
    nodesArray.forEach(node => {
        node.style.borderColor = "var(--white)";
    });

    // Finally, select the right one
    imgNode.style.borderColor = "var(--green)";
}