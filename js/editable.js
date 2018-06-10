// Author: Max Ångman

// OnClick event for when a editable textfield is clicked
var editfieldClick = function(element){
    if(element.dataset["hasbuttons"] == "false"){
        // Add button with a Material Icon.
        // addIconNode: ("Icon Name", "Clicked element", "Type of node", "css Classes")
        var closeNode = addIconNode("close", element, "button", "material-icons");
        var acceptNode = addIconNode("check", element, "button", "material-icons");

        //Set OnClick events for new buttons
        closeNode.onclick = editfieldDiscard;
        acceptNode.onclick = editfieldAccept;

        //Tell clicked element that it now has buttons
        element.dataset["hasbuttons"] = true;
    }
};

// OnClick event for when a accept button is pressed for a editable textfield
var editfieldAccept = function(element){
    // Remove buttons so the user can't do multiple actions at once
    removeButtons(element);

    //Id of element to save
    var id = element.path[1].children[0].id;
    var text = element.path[1].children[0].textContent;

    console.log(id);

    jQuery.ajax({
    type: "POST",
    url: 'HandleEvents.php?do=save',
    dataType: 'json',
    data: {id: id, text: text},

    success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                      yourVariable = obj.result;
                  }
                  else {
                      console.log(obj.error);
                  }
            }
          });
};

// OnClick event for when a discard button is pressed for a editable textfield
var editfieldDiscard = function(element){
    // Remove buttons so the user can't do multiple actions at once
    removeButtons(element);

    //Id of element to discard
    var id = element.path[1].children[0].id;

    jQuery.ajax({
    type: "POST",
    url: 'HandleEvents.php?do=get',
    dataType: 'json',
    data: {id: id},

    success: function (obj, textstatus) {
                  element.path[1].children[0].textContent = obj;
            }
          });
};

//Create and add new node with material icons
var addIconNode = function(name, refNode, elmType, classes){
    var node = document.createElement(elmType);     // Create new html element
    node.className = classes + " editFieldButton";  // Add css classes
    var text = document.createTextNode(name);       // Icons name
    node.appendChild(text);                         // Add icon to node
    node.dataset["button_for"] = refNode.id;        // Link node to it's parent
    refNode.parentNode.insertBefore(node, refNode.nextSibling);

    return node;
};

// Takes in a html button element and removes it from it's parent
var removeButtons = function(element){
    var buttonNodes = [];

    // Finds all buttons attached to the parent node of clicked element
    element.target.parentNode.childNodes.forEach(function(node){
        if(node.nodeName === "BUTTON"){
            buttonNodes.push(node);
        }
    });

    // Goes through all found buttons and removes them from their parent and
    // tells the field they belonged to that it no longer has buttons
    buttonNodes.forEach(function(node){
        var editfield = document.getElementById(node.dataset["button_for"]);
        if(editfield.dataset["hasbuttons"] == "true"){
            editfield.dataset["hasbuttons"] = false;
        }
        node.parentNode.removeChild(node);
    });
}


// OnClick event for when a editable Education is clicked
var editEducationClick = function(element){
    if(element.dataset["hasbuttons"] == "false"){
        // Add button with a Material Icon.
        // addIconNode: ("Icon Name", "Clicked element", "Type of node", "css Classes")
        var closeNode = addIconNode("close", element, "button", "material-icons");
        var acceptNode = addIconNode("check", element, "button", "material-icons");

        //Set OnClick events for new buttons
        closeNode.onclick = editEducationDiscard;
        acceptNode.onclick = editEducationAccept;

        //Tell clicked element that it now has buttons
        element.dataset["hasbuttons"] = true;
    }
};

// OnClick event for when a accept button is pressed for a editable textfield
var editEducationAccept = function(element){
    // Remove buttons so the user can't do multiple actions at once
    removeButtons(element);

    //Id of element to save
    var thumbnails = document.getElementsByClassName("thumbnail");

    console.log(thumbnails);
    var data =[];

    for (var i = 0; i < thumbnails.length; i++) {
      var img = thumbnails[i].getElementsByTagName("img")[0];
      var p = thumbnails[i].getElementsByTagName("p")[0];
      var thumbnail = {
        "img": {
          src: img.src,
          alt: img.alt
        },
        "text": p.textContent
      }
      data.push(thumbnail)
    }
    console.log(data);

    jQuery.ajax({
    type: "POST",
    url: 'HandleEvents.php?do=saveEducation',
    dataType: 'json',
    data: {data: data},
  });
};

// OnClick event for when a discard button is pressed for a editable textfield
var editEducationDiscard = function(element){
    // Remove buttons so the user can't do multiple actions at once
    removeButtons(element);
};
