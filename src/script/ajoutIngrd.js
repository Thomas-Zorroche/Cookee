function validate()
{
    var container = document.getElementById("Resume-ingrd-cont");
    var children = container.children;

    // Retrieve name, path and unite of ingredient
    var path = children[0].src.slice(48);
    var name = children[1].textContent;
    var unite = children[2].textContent;

    // Form Data Creation
    var form = new FormData();
    form.append("name", name);
    form.append("path", path);
    form.append("unite", unite);
    
    // Send form data to php file
    fetch("lib/addIngredient.php", {
        method: "POST",
        body : form
    })
    .then( (res)=> {
        return res.text();
    })
    .then( (data)=> {
        alert(data);
        window.location.href = "index.php";
    })
}