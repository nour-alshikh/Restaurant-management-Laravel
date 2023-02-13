    @include('admin.style')

    @include('admin.body')
            <div style="padding: 60px 0 0 230px; background-color: #0e1113; min-height: 100vh; color: white;" id="layoutSidenav_content">

                <h1 style="text-align: center; font-size: 20px; margin: 30px;">
                    Add To Menu
                </h1>

                <form method="POST" action="{{ url('store_menu') }}" enctype="multipart/form-data" class="w-75 m-auto">

                    @csrf

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <input name="desc" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter description">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                        <input name="price" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Price">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" id="exampleFormControlInput1" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info text-white m-auto d-block" value="Add Item To menu">
                    </div>
                </form>


                <table class="table table-dark table-striped w-75 m-auto text-center">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr height="50px">
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->desc }}</td>
                        <td>{{ $item->price }}</td>

                        <td>
                            <img style="width: 100px; height: 100px; text-align: center;" class=" m-auto" src="/menuItems/{{ $item->image }}" />
                        </td>

                        <td>
                            <a class="btn btn-danger" href="{{ url('delete_item' , $item->id) }}">Delete Item</a>
                            <a class="btn btn-primary" href="{{ url('edit_item' , $item->id) }}">Update Item</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
            @include('admin.script')
