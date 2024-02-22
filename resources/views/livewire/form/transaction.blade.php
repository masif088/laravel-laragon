<form wire:submit.prevent="{{ $action }}">

    <div class="mt-3">

        <div class="autocomplete">
            <div class="autocomplete" wire:ignore>
                <label class="block text-sm font-bold dark:text-white" for="data">
                    Email Pelanggan
                </label>

                <input
                    type="text"
                    wire:model="nameQuery"
                    id="myInput"
                    class=" bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white"
                >
                <div id="myInputautocomplete-list" class="autocomplete-items">

                </div>
                <script>
                    document.addEventListener('livewire:load', function () {
                        function autocomplete(inp, arr) {
                            var currentFocus;
                            inp.addEventListener("input", function(e) {
                                var a, b, i, val = this.value;
                                closeAllLists();
                                if (!val) { return false;}
                                currentFocus = -1;
                                a = document.createElement("DIV");
                                a.setAttribute("id", this.id + "autocomplete-list");
                                a.setAttribute("class", "autocomplete-items");
                                this.parentNode.appendChild(a);
                                for (i = 0; i < arr.length; i++) {
                                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                                        b = document.createElement("DIV");
                                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                                        b.innerHTML += arr[i].substr(val.length);
                                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                        b.addEventListener("click", function(e) {
                                            @this.set('nameQuery',this.getElementsByTagName("input")[0].value,true);
                                            Livewire.emit('setPackage')
                                            inp.value = this.getElementsByTagName("input")[0].value;
                                            closeAllLists();
                                        });
                                        a.appendChild(b);
                                    }
                                }
                            });
                            /*execute a function presses a key on the keyboard:*/
                            inp.addEventListener("keydown", function(e) {
                                var x = document.getElementById(this.id + "autocomplete-list");
                                if (x) x = x.getElementsByTagName("div");
                                if (e.keyCode == 40) {
                                    currentFocus++;
                                    addActive(x);
                                } else if (e.keyCode == 38) {
                                    currentFocus--;
                                    addActive(x);
                                } else if (e.keyCode == 13) {
                                    e.preventDefault();
                                    if (currentFocus > -1) {
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
                                var x = document.getElementsByClassName("autocomplete-items");
                                for (var i = 0; i < x.length; i++) {
                                    if (elmnt != x[i] && elmnt != inp) {
                                        x[i].parentNode.removeChild(x[i]);
                                    }
                                }
                            }

                            document.addEventListener("click", function (e) {
                                closeAllLists(e.target);
                            });
                        }

                        var countries = [
                            @foreach($optionName as $data)
                                '{{ $data }}',
                            @endforeach
                        ];
                        autocomplete(document.getElementById("myInput"), countries);
                    });

                </script>
            </div>
        </div>


    </div>


    <x-argon.form-generator repositories="Transaction"/>
    <button
        type="submit"
        class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white hover:bg-indigo-500 text-center">
        Konfirmasi
    </button>
</form>
