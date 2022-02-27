<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                                more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div @include('admin.sidebar') @include('admin.navbar') <div class="container-fluid page-body-wrapper">
        <div align="center" style="padding-top: 100px">
            <table>
                <tr style="background-color: crimson;">
                    <th style="padding: 10px">Customer Name</th>
                    <th style="padding: 10px">Email</th>
                    <th style="padding: 10px">Phone</th>
                    <th style="padding: 10px">Doctor Name</th>
                    <th style="padding: 10px">Date</th>
                    <th style="padding: 10px">Message</th>
                    <th style="padding: 10px">Status</th>
                    <th style="padding: 10px">Approved</th>
                    <th style="padding: 10px">Cancelled</th>
                    <th style="padding: 10px">Send Notification</th>
                </tr>
                @foreach ($data as $info)
                    <tr align="center" style="background-color: khaki; color:black;">
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->email }}</td>
                        <td>{{ $info->phone }}</td>
                        <td>{{ $info->doctor }}</td>
                        <td>{{ $info->date }}</td>
                        <td>{{ $info->message }}</td>
                        <td>{{ $info->status }}</td>
                        <td><a class="btn btn-behance" href="{{ url('approved', $info->id) }}">Approve</a></td>
                        <td><a class="btn btn-danger" href="{{ url('cancelled', $info->id) }}">Cancel</a></td>
                        <td><a class="btn btn-primary" href="{{ url('emailview', $info->id) }}">Send Mail</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('admin.script')
</body>

</html>
