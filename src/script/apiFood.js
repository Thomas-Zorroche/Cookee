/**
 * Retrive the correct name of the ingredient searched by the user.
 * @param {string} userIngredientName Input string user
 * @return {string} Return correct name ingredient as string
 */
async function getIngrdName(userIngredientName) {
    // Build url with user input name
    var url = 'https://api.spoonacular.com/food/ingredients/search?query='+userIngredientName+'&number=4';
    // API Call
    var response = await fetch( url + '&apiKey=' + apiKey);
    // Retrieve informations in json
    var correctNames = await response.json();
    
    return correctNames;
}

/**
 * Retrive the complete url of ingredient searched image. 
 * @param {string} ingredientName Correct name of ingredient return by the API
 * @return {string} Return complete url
 */
function getIngrdImageUrl(ingredientName) {
    return 'https://spoonacular.com/cdn/ingredients_100x100/' + ingredientName;
}