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