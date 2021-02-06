function ingrdTypingEvent(type) {
    var name = document.getElementById("Name").value;
    name = normalizeInputField(name);

    if (type == "ingrd")
        var ingredientsDatabase = getIngredientsDatabase();

    // Check if name size is at least 2
    if (name.length < 3) {
        inputWarn("Doit contenir au minimum 3 lettres.");
    }
    // Check if name is already inside database
    else if (type == "ingrd" && isInsideArray(name, ingredientsDatabase)) {
        inputWarn("L'ingrédient est déjà dans la base de données.");
    }
    // Check if name contains special caracters
    else if (containsSpecialCaracters(name)) {
        inputWarn("Ne doit pas contenir de charactères spéciaux tels que : ' \" ^ ¨ é à è ... ");
    }
    else {
        inputCorrect();
    }
    checkForm();
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

function isInsideArray(element, array) {
    element = element.toLowerCase();
    for (var item of array) {
        item = item.toLowerCase();
        if (item === element) return true;
    }
    return false;
}

function isInputNameValid() {
    var textField = document.getElementById("Name");
    return (textField.style.border === "2px solid var(--green)");
}

function containsSpecialCaracters(string)
{
    var format = /[`éàè!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

    if(format.test(string)){
      return true;
    } else {
      return false;
    }
}

function normalizeInputField(string)
{
    // Delete Space at the end and the beginning of a text
    string = string.trim();
    // Uppercase first letter
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function inputWarn(message) 
{
    var textField = document.getElementById("Name");
    var warningNode = document.getElementById("Warning-ingrd-name");

    textField.style.border = "2px solid var(--red)"
    textField.style.boxShadow = "0px 0px 10px var(--red)";
    warningNode.textContent = message;
}

function inputCorrect() 
{
    var textField = document.getElementById("Name");
    var warningNode = document.getElementById("Warning-ingrd-name");

    textField.style.border = "2px solid var(--green)"
    textField.style.boxShadow = "0px 0px 10px var(--green)";
    warningNode.textContent = ""
}