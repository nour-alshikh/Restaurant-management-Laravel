    @include('admin.style')

    @include('admin.body')
            <div style="padding: 60px 0 0 230px; background-color: #0e1113; min-height: 100vh; color: white;" id="layoutSidenav_content">

                <h1 style="text-align: center; font-size: 20px; margin: 30px;">
                    Update Item
                </h1>

                <form method="POST" action="{{ url('update_menu' , $item->id) }}" enctype="multipart/form-data" class="w-75 m-auto">

                    @csrf

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter title" value="{{ $item->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <input name="desc" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter description" value="{{ $item->desc }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                        <input name="price" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Price" value="{{ $item->price }}">
                    </div>

                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <p>Old Image</p>
                        <img style="width: 200px; height: 200px;" src="/menuItems/{{ $item->image }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" id="exampleFormControlInput1" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info text-white m-auto d-block" value="Update Item">
                    </div>
                </form>

            </div>
        </div>
            @include('admin.script')
