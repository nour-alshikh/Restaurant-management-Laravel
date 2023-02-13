    @include('admin.style')

    @include('admin.body')
            <div style="padding: 60px 0 0 230px; background-color: #0e1113; min-height: 100vh; color: white;" id="layoutSidenav_content">

                <h1 style="text-align: center; font-size: 20px; margin: 30px;">
                    Orders
                </h1>




                <table class="table table-dark table-striped w-75 m-auto text-center">
                    <tr>
                        <th>Name</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>quantity</th>
                        <th>phone</th>
                        <th>address</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr height="50px">
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->item_name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
            @include('admin.script')
