function addTag(e)
{
    var container = document.getElementById("Tags-picked-cont");
    var childrenCount = container.childElementCount; 

    // Max value for tags is 3
    if (childrenCount >= 3) return;

    var target = e.target || e.srcElement;
    container.insertAdjacentHTML('beforeend', '<p>' + target.textContent + '<span onclick="deleteTag(event)"> x </span> </p>');
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