function getURLData()
{
    var parameterFragments = location.search.substr(1).split("&");
    var parameters = {}
    for(var i = 0; i < parameterFragments.length; i++)
    {
        var splittedParameter = parameterFragments[i].split("=");
        parameters[splittedParameter[0]] = decodeURIComponent(splittedParameter[1]);
    }
    return parameters;
}