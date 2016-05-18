// Module function keeps variables local
(function() {

    var buttons;
    var bookmarkArray;

    window.onload = function () {

        // Load session car bookmark data
        getBookmarkArray();

        // Events
        buttons = document.getElementsByClassName('d-car-bookmark-button');

        for(var i = 0; i < buttons.length; i++) {

            // Get one button
            var button = buttons[i];

            // Load favorite data from array, true means the car is checked
            if(bookmarkArray[i]){
                button.checked = true;
            }

            // Create onclick events
            (function(index){
                button.onclick = function(){
                    bookmark(index);
                }
            })(i);
        }

    }

    function bookmark(index){
        if(buttons[index].checked){
            // Button was just checked

            // Set value of array
            bookmarkArray[index] = "true";
        }else {
            // Button was just unchecked

            // Set value of array
            bookmarkArray[index] = "false";
        }
        // Set session car bookmark data
        setBookmarkArray();
    }

    function getBookmarkArray(){
        bookmarkArray = [false, true, true, false];
    }

    function setBookmarkArray(){

    }

}) ();
