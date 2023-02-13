    @include('admin.style')

    @include('admin.body')
            <div style="padding: 60px 0 0 230px; background-color: #0e1113; min-height: 100vh; color: white;" id="layoutSidenav_content">


                <h1 style="text-align: center; font-size: 20px; margin: 30px;">
                    All Reservation
                </h1>

                <table class="table table-dark table-striped w-75 m-auto text-center">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr height="50px">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->time }}</td>
                        <td>{{ $item->message }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('delete_reservation' , $item->id) }}">Delete Item</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


            </div>
        </div>
            @include('admin.script')
