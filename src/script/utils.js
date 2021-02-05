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