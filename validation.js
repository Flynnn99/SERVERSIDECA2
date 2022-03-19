function addRecord_validation()
{
    var addName = document.getElementById('add_Name');
    var addNameValue = document.getElementById('add_Name').value;
    var addNameLength = addNameValue.length
    if(addNameLength < 5)
    {
        document.getElementById('name_err').innerHTML = 'Value must not be less than 5';
        addName.focus();
        document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
        document.getElementById('name_err').innerHTML = 'Valid User id';
        document.getElementById('name_err').style.color = "#00AF33";
    }

}