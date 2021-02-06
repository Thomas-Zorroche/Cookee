var uniteIngrdPicked = false;

document.querySelector("form").addEventListener('change', function() {
    checkForm();
});

function checkForm() {
    (isFormValid()) ? activateValidateButton() : disableValideButton();
}

function isFormValid() {
    return (isInputNameValid() && isThumbnailValid() && uniteIngrdPicked);
}

function activateValidateButton() {
    var Btn = document.getElementById("Btn-validate");
    Btn.style.opacity = "1.0"
    Btn.disabled = false;
}

function disableValideButton() {
    var Btn = document.getElementById("Btn-validate");
    Btn.style.opacity = "0.25"
    Btn.disabled = true;
}

function isInputNameValid() {
    var textField = document.getElementById("Name");
    return (textField.style.border === "2px solid var(--green)");
}

function isThumbnailValid() {
    return !(document.getElementById("ingrd-path").value == "");
}


/**
 * Add img into html code with image provide by user input field.
 * Call on Preview btn click.
 */
async function displayIngrdThumbnail()
{
    // Retrieve user input from text input field (english name)
    var userIngrdName = document.getElementById("nom-english").value;

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
            "<div class='thumbnail-cont' onclick='selectIngrd(event)'><img class='ingrd-img' src='" + url + "' onclick='selectIngrd(event)'></div>");
        }
    })
}

/**
 * Select an image as the one to be used for the ingredient
 * Call on Igrd img thumbnail click.
 */
function selectIngrd(e)
{
    var node = e.target || e.srcElement;
    var containerNode, thumbnailNode, imgNode;
    if (node.tagName == "DIV") {
        imgNode = node.firstChild;
        thumbnailNode = node;
        containerNode = node.parentNode;
    }
    else if (node.tagName == "IMG") {
        imgNode = node;
        thumbnailNode = node.parentNode;
        containerNode = node.parentNode.parentNode;
    }

    // Get all img nodes and disable unselect all
    var nodes = containerNode.getElementsByTagName("div");
    var nodesArray = Array.prototype.slice.call(nodes);
    nodesArray.forEach(node => {
        node.classList.remove("thumbnail-cont-select");
    });

    thumbnailNode.classList.toggle("thumbnail-cont-select");
    document.getElementById("ingrd-path").value = imgNode.src.slice(48);
    checkForm();
}



function selectIngrdUnite() {
    uniteIngrdPicked = true;
}
