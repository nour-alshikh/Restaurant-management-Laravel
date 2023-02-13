    @include('admin.style')

    @include('admin.body')
            <div style="padding: 60px 0 0 230px; background-color: #0e1113; min-height: 100vh; color: white;" id="layoutSidenav_content">

                <h1 style="text-align: center; font-size: 20px; margin: 30px;">
                    Add Chef
                </h1>

                <form method="POST" action="{{ url('create_chef') }}" enctype="multipart/form-data" class="w-75 m-auto">

                    @csrf

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Speciality</label>
                        <input name="spec" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter description">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control" id="exampleFormControlInput1" placeholder="title">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info text-white m-auto d-block" value="Add Chef">
                    </div>
                </form>


                <table class="table table-dark table-striped w-75 m-auto text-center">
                    <tr>
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr height="50px">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->spec }}</td>

                        <td>
                            <img style="width: 100px; height: 100px; text-align: center;" class=" m-auto" src="/chefs/{{ $item->image }}" />
                        </td>

                        <td>
                            <a class="btn btn-danger" href="{{ url('delete_chef' , $item->id) }}">Delete chef</a>
                            <a class="btn btn-primary" href="{{ url('edit_chef' , $item->id) }}">Update chef</a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
            @include('admin.script')
