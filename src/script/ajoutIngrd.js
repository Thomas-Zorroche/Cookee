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

function ingrdTypingEvent() {
    var textField = document.getElementById("Ingrd-name-fr");
    var name = textField.value;
    name = normalizeInputField(name);
    
    var warningNode = document.getElementById("Warning-ingrd-name");
    
    var ingredientsDatabase = getIngredientsDatabase();

    // Check if name size is at least 2
    if (name.length < 3) {
        textField.style.border = "2px solid var(--red)"
        textField.style.boxShadow = "0px 0px 10px var(--red)";
        warningNode.textContent = "Doit contenir au minimum 3 lettres."
    }
    // Check if name is already inside database
    else if (isIngrdInsideDatabase(name, ingredientsDatabase)) {
        textField.style.border = "2px solid var(--red)"
        textField.style.boxShadow = "0px 0px 10px var(--red)";
        warningNode.textContent = "L'ingrédient est déjà dans la base de données."
    }
    // Check if name contains special caracters
    else if (containsSpecialCaracters(name)) {
        textField.style.border = "2px solid var(--red)"
        textField.style.boxShadow = "0px 0px 10px var(--red)";
        warningNode.textContent = "Ne doit pas contenir de charactères spéciaux tels que : ' \" ^ ¨ é à è ";
    }
    else {
        textField.style.border = "2px solid var(--green)"
        textField.style.boxShadow = "0px 0px 10px var(--green)";
        warningNode.textContent = ""
    }

}

function getIngredientsDatabase() {
    var containerIngrd = document.getElementById("Ingrd-array-target");
    var ingrdNodes = containerIngrd.getElementsByTagName('p');
    var ingrdNames = [];

    for (const ingrdNode of ingrdNodes) {
        ingrdNames.push(ingrdNode.textContent);
    }
    return ingrdNames;
}

function isIngrdInsideDatabase(ingrdName, ingrdArrayDdb) {
    ingrdName = ingrdName.toLowerCase();
    for (var name of ingrdArrayDdb) {
        name = name.toLowerCase();
        if (name === ingrdName) return true;
    }
    return false;
}

