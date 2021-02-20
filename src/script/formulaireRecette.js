/*
 * Functions for validate form
 * ===============================================================================
 */
document.querySelector("form").addEventListener('change', function() {
    checkForm();
});

function checkForm() {
    (isFormValid()) ? activateValidateButton() : disableValideButton();
}

function isFormValid() {
    return (isInputNameValid());
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
/*
 * ===============================================================================
 */

function selectIngrd(e)
{
    var node = e.target || e.srcElement;

    // Check if node is a div
    if (node.tagName == "DIV") {
        node.classList.toggle("thumbnail-cont-select");
    }
    else {
        node.parentNode.classList.toggle("thumbnail-cont-select");
    }
}

function addTag(e)
{
    var container = document.getElementById("Tags-picked-cont");
    var childrenCount = container.childElementCount; 

    // Max value for tags is 3
    if (childrenCount >= 3) return;
    
    // Retrieve tag in text format
    var target = e.target || e.srcElement;
    var tag = target.textContent;

    // Check whether the tag is already picked
    var nodes = container.getElementsByTagName("p");
    var nodesArray = Array.prototype.slice.call(nodes);
    var alreadyPicked = false;
    nodesArray.forEach(node => {
        if (node.textContent === tag + " x ")
            alreadyPicked = true;
    });
    if (alreadyPicked) return;

    // Add tag
    container.insertAdjacentHTML('beforeend', '<p>' + tag + '<span onclick="deleteTag(event)"> x </span></p>');
}

function deleteTag(e)
{
    // x text
    var target = e.target || e.srcElement;
    // span node
    var spanNode = target.parentNode;
    // p node
    var pNode = spanNode.parentNode;
    
    pNode.removeChild(spanNode);
}

function selectLetter(e) 
{
    var node = e.target || e.srcElement;

    // Unselect all letters
    var containerLetters = node.parentNode;
    for (var letter of containerLetters.children) {
        letter.classList.remove("letter-selected");
    }

    // Select the right letter
    node.classList.toggle("letter-selected");

    filterLetter(node.textContent);
}

function filterLetter(letter)
{
    // Form Data Creation
    var form = new FormData();
    form.append("letter", letter);

    // Send form data to php file
    fetch("lib/filterLetter.php", {
        method: "POST",
        body : form
    })
    .then( (res)=> {
        return res.json();
    })
    .then( (data)=> {
        console.log(data);
        displayThumbnailIngrd(data)
    })
}

function createAlphabetIndex()
{
    var alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
    var container = document.getElementById("Alphabet-index");

    for (var letter of alphabet) {
        var para = document.createElement("li");
        var node = document.createTextNode(letter);
        para.setAttribute('onclick', "selectLetter(event)");
        para.appendChild(node);
        container.appendChild(para);
    }
}

function displayThumbnailIngrd(arrayIngrd)
{
    var container = document.getElementById("ingrd-img-cont");
    container.innerHTML = "";

    for (let i = 0; i < arrayIngrd.length; i++) {
        // div node 
        let divNode = document.createElement("div");

        // img node
        let imgNode = document.createElement("img");
        imgNode.setAttribute('src', getIngrdImageUrl(arrayIngrd[i][1]));

        // p node
        let pNode = document.createElement("p");
        let pText = document.createTextNode(arrayIngrd[i][0]);
        pNode.appendChild(pText);

        divNode.appendChild(imgNode);
        divNode.appendChild(pNode);

        container.appendChild(divNode);
    }
}

{/* <div class="thumbnail-cont" onclick="selectIngrd(event)">
    <img class="ingrd-img" src="https://spoonacular.com/cdn/ingredients_100x100/'.$ingrdPaths[$i].'" >
    <p>'.$ingrdNames[$i].'</p>
</div> */}

