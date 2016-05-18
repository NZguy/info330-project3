// Module function keeps variables local
(function() {

    var buttons;
    var bookmarkArray;

    window.onload = function () {
        getBookmarkArray();
    };

    function onBookmarkLoad(gotBookmarkArray) {

        // Events
        buttons = document.getElementsByClassName('d-car-bookmark-button');

        for(var i = 0; i < buttons.length; i++) {

            // Get one button
            var button = buttons[i];

            // Load favorite data from array, true means the car is checked
            if(gotBookmarkArray[i]){
                button.checked = true;
            }

            // Create onclick events
            (function(index){
                button.onclick = function(){
                    bookmark(index);
                }
            })(i);

            bookmarkArray = gotBookmarkArray;
        }

    }

    function bookmark(index){
        if(buttons[index].checked){
            // Button was just checked

            // Set value of array
            bookmarkArray[index] = true;
        }else {
            // Button was just unchecked

            // Set value of array
            bookmarkArray[index] = false;
        }
        // Set session car bookmark data
        setBookmarkArray(bookmarkArray);
        console.log(bookmarkArray);
    }

    function getBookmarkArray() {
        // bookmarkArray = [false, true, true, false];
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "/bookmarkservice?action=get", true);
        ajax.addEventListener("load", function(data) {
            onBookmarkLoad(JSON.parse(data.target.responseText));
        });
        ajax.send();
    }

    /**
     *
     * @param {!Array} bookmarks
     */
    function setBookmarkArray(bookmarks) {
        var jsonEncodedArray = JSON.stringify(bookmarks);
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "/bookmarkservice?action=set&data=" + jsonEncodedArray);
        ajax.addEventListener("load", function(data) {
            console.log(data.target.responseText);
        });
        ajax.send();
    }

}) ();
