    @include('admin.style')

    @include('admin.body')
            <div style="padding: 60px 0 0 230px; background-color: #0e1113; min-height: 100vh; color: white;" id="layoutSidenav_content">

                <h1 style="text-align: center; font-size: 20px; margin: 30px;">
                    All Users
                </h1>

                <table class="table table-dark table-striped w-75 m-auto text-center">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr height="50px">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->name }}</td>
                        @if ($user->usertype != '1')
                        <th>
                            <a class="btn btn-danger" href="{{ url('delete' , $user->id) }}">Delete User</a>
                        </th>
                        @else
                        <th>
                            <p>this user is an admin</p>
                        </th>
                        @endif
                    </tr>
                    @endforeach
                </table>

            </div>
            @include('admin.script')
