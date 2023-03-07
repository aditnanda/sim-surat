@props(['data' => ['Aditya', 'Vira']])

<div x-data="{
    model: @entangle($attributes->wire('model')),
}" wire:ignore>

    <div class="autocomplete" style="width: 100%">
        <textarea id="myInput" type="text" name="myCountry" placeholder="pisahkan dengan koma agar dapat diolah sistem"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            rows="3"></textarea>
    </div>
</div>

<script>
    function showList(inp, arr, val) {
        // console.log(inp);
        // console.log(arr);
        // console.log(val + " val");
        /*create a DIV element that will contain the items (values):*/
        var a = document.createElement("DIV");
        a.setAttribute("id", "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        inp.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (var i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                var b = document.createElement("DIV");
                b.setAttribute("class", "text-gray-700");

                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    if (inp.value.trim().substr(inp.value.trim().length - 1) == ',' || inp.value.trim() == '') {
                        inp.value = inp.value + this.getElementsByTagName("input")[0].value;
                    }else{
                        inp.value = inp.value + ','+this.getElementsByTagName("input")[0].value;

                    }

                });
                a.appendChild(b);
            }
        }
    }

    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            // console.log('input');
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            showList(inp, arr, val);
        });

        inp.addEventListener("focus", function(e) {
            // console.log('focus');

            closeAllLists();
            showList(inp, arr, "");
        });

        inp.addEventListener("click", function(e) {
            // console.log('focus');

            closeAllLists();
            showList(inp, arr, "");
        });


        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            // console.log('keydown');

            var x = document.getElementById("autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            closeAllLists(e.target);
        });
    }

    /*An array containing all the country names in the world:*/
    <?php
    $data = json_encode($data);
    echo 'var countries = ' . $data . ";\n";
    ?>
    // var countries = {{ json_encode($data) }};

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    try {
        autocomplete(document.getElementById("myInput"), countries);

    } catch (error) {

    }
</script>

