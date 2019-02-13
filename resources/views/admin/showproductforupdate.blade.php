
<div >
    <div>
        <div >

            <!-- Modal Header -->


            <!-- Modal body -->
            <div class="modal-body">
                <form action="update" method="post">
                    {{csrf_field()}}

                    <input type="text" value="{{$idd->productName}}" name="productName"/>
                    <input type="number" value="{{$idd->productPrice}}" name="productPrice"/>
                    <input type="text" value="{{$idd->productAddress}}"name="productAddress"/>

                    <textarea value="{{$idd->productDescription}}" name="productDescription">{{$idd->productDescription}}</textarea>
                    <select  name="catId">

                        @foreach($catName as $catname)
                            <option value="{{$idd->catId}}">{{$catname->categoryName}}</option>
                            <input type="hidden" value="{{$idd->userId}}" name="userId"/>
                        @endforeach
                    </select>
                    <input type="file" value="{{$idd->productImage}}" name="productImage">{{$idd->productImage}}</input>

                    <button onclick="return confirm ('Are You Sure You want to delete ! ');" class="btn btn-primary">update</button>
                </form>
            </div>

            <!-- Modal footer -->


        </div>
    </div>
</div>