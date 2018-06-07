// Author: Max Ångman
var deleteObject = function(element){
    var kontainerNode =  element.parentNode;
    var textareaId = "";
    element.parentNode.childNodes.forEach(function(node){
        if(node.nodeName === "P"){
            textareaId = node.id;
        }
    });
};
