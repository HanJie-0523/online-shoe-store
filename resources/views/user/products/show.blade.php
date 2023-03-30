<x-layouts.user>


    <div class="row pt-5">
        <div class="col-3">
            <x-products.categories />
        </div>
        <div class="col">
            <div class="row">
                <div class="col-5">
                    <div style="width: 20em">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
                    </div>
                </div>

                <div class="col">

                    <h3>{{ $product->name }}</h3>

                    @foreach ($product->categories as $category)
                        {{ $category->name }}
                    @endforeach

                    <div class="py-2">
                        RM {{ $product->price }}
                    </div>
                    <form id="cart_form" method="POST"
                        action="{{ route('user.carts.store', ['product' => $product, 'color' => $color]) }}">
                        <input type="hidden" name="id" value="{{ $product->id }}" />
                        <div class="d-flex flex-row">
                            <input type="hidden" id="color" name="color" value="">

                            <div id="colorButton">
                                <div class="px-2">
                                    @foreach ($stocks as $stock)
                                        <button id="{{ $stock->color }}" type="button"
                                            onclick="pickColour('{{ $stock->color }}')" class="btn"
                                            id="{{ $stock->color }}"
                                            style="height:80px; width:80px;">{{ $stock->color }}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="py-3">
                            Select Size:
                        </div>

                        <div class="d-flex flex-row">

                            <div class="px-2" id="radioButtonSizes">
                            </div>
                            {{-- @foreach ($sizes as $size)
                                <div class="px-2">
                                    <input type="radio" class="btn-check" name="size" value="{{ $size->size }}"
                                        id="{{ $size->size }}" autocomplete="off" required
                                        onclick="pickSize('{{ $size->size }}')">
                                    <label class="btn" for="{{ $size->size }}">{{ $size->size }}</label>
                                </div>
                            @endforeach --}}
                        </div>


                        <div class="col p-1">
                            @auth
                                @csrf
                                <button type="button" class="btn btn-dark btn-lg w-100 " onclick="addToCart2()">Add to
                                    Cart</button>
                            @else
                                <a class="btn btn-dark btn-lg w-100"
                                    href="{{ route('login', ['redir' => request()->fullUrl()]) }}">Please Login</a>
                            @endauth
                        </div>

                    </form>

                    <div class="col p-1">
                        @auth
                            <div id="wishlist">
                                <div id="wishlist_added">
                                    <button type="button" class="btn btn-light btn-lg w-100 ">Add to Wishlist <svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6" height="22" width="22">
                                            <path
                                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                        </svg>
                                    </button>
                                </div>

                                <div id="wishlist_add">
                                    <button id="wishlist_add" type="submit" class="btn btn-light btn-lg w-100 ">Add to
                                        Wishlist
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6" height="22"
                                            width="22">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>aaa
                                    </button>
                                </div>
                                {{-- @if (Auth::user()->wishlistProducts->where('pivot.product_id', $product->id)->count() > 0)
                                    <form method="POST"
                                        action="{{ route('user.products.wishlist', ['wishlist' => false, 'product' => $product]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-light btn-lg w-100 ">Add to Wishlist <svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="w-6 h-6" height="22" width="22">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form method="POST"
                                        action="{{ route('user.products.wishlist', ['wishlist' => true, 'product' => $product]) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-light btn-lg w-100 ">Add to Wishlist
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6" height="22"
                                                width="22">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif --}}
                            </div>
                        @else
                        @endauth
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-12" style="white-space: pre-line;">
                    {{ $product->description }}
                </div>
                {{-- <div class="col">
                    {{ $product->rating }}
                </div> --}}
            </div>

        </div>
    </div>





</x-layouts.user>

<script type="module">

    let wishlist = '{{Auth::user()->wishlistProducts->where('pivot.product_id', $product->id)->count() > 0}}';
    console.log(wishlist);


    if(wishlist){
        console.log('haha');
        document.getElementById('wishlist_add').style.display = "none";
        // console.log(document.getElementById('wishlist_add'));
    }

    //Auto select default color
    document.addEventListener("DOMContentLoaded", function(event) {
        let defaultColor = document.getElementById("{{$stocks->first()->color}}");
        defaultColor.click();
    });


    var btnContainer = document.getElementById("colorButton");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("btn");

    let id = "{{$product->id}}";

    let color = "";
    let size = "";
    let sizes = "";


    window.pickColour=(c)=>{
        color = c;
        document.getElementById("color").value = c;
        for (var i = 0; i < btns.length; i++) {
           btns[i].className = btns[i].className.replace(" active", "");
        };
        document.getElementById(c).className += " active";

        axios.post('{{route("user.products.changeSize")}}',{id:id, color:color}).then(function(r) {
            // console.log(r);
            // {{$sizes}} = r.data.sizes;
            // console.log(this.id);
            sizes = r.data.sizes;
            console.log(sizes[0].size);
            const radioButtonSizes = document.getElementById("radioButtonSizes");

            //remove radio buttons first then only add new radio btn by forloop
            radioButtonSizes.innerHTML = "";

            for (var k = 0; k <sizes.length; k++) {
                let label = document.createElement("label");
                label.innerText = sizes[k].size;
                label.className = "btn";
                label.htmlFor = sizes[k].size;
                let input = document.createElement("input");
                input.className = "btn-check"
                input.type = "radio";
                input.name = "size";
                input.id = sizes[k].size;
                input.value = sizes[k].size;
                input.onclick = () => { pickSize(input.value) };
                radioButtonSizes.appendChild(input);
                radioButtonSizes.appendChild(label);
            };



            // alert(r.data.color);
        }).catch(function(e){
            if(e.response){
                // alert(e.response.data.error);
            }else{
                alert(e);
            }
        });

    }



    window.pickSize=(s)=>{
        size = s;
    }

     /*
    window.addToCart=()=>{
        axios.post('{{route("user.carts.add")}}',{id:id,colour:colour,size:size}).then(function(r) {
            alert(r.data.id + " " + r.data.colour + " " + r.data.size);
        });
    }
    */

    window.addToCart2=()=>{
        let form = new FormData(document.getElementById('cart_form'));


        axios.post('{{route("user.carts.add")}}',form).then(function(r) {

            alert(r.data.id + " " + r.data.color + " " + r.data.size);
        }).catch(function(e){
            if(e.response){
                alert(e.response.data.error);
            }else{
                alert(e);
            }
        });
    }

    // window.addToWishlist=()=>{

    // }


    window.addToWishlist=()=>{
        axios.put('{{route("user.products.addToWishlist")}}',{id:id}).then(function(r){

            alert(r.data.x);
        }).catch(function(e){
            if(e.response){
                alert(e.response.data.error);
            }else{
                alert(e);
            }
        });
    }


</script>
