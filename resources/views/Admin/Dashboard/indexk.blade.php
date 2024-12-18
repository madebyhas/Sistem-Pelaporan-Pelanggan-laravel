@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Dashboard')

@section('content')

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
       
    </head>

    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
                        <!-- Quick Action Toolbar Starts-->
                        <div class="row quick-action-toolbar">
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-header d-block d-md-flex">
                                        <h5 class="mb-0">Quick Actions</h5>
                                        <p class="ml-auto mb-0">How are your active users trending overtime?<i
                                                class="icon-bulb"></i></p>
                                    </div>
                                    <div class="d-md-flex row m-0 quick-action-btns" role="group"
                                        aria-label="Quick action buttons">
                                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                            <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i> Add
                                                Client</button>
                                        </div>
                                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                            <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i> Create
                                                Quote</button>
                                        </div>
                                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                            <button type="button" class="btn px-0"><i class="icon-folder mr-2"></i>
                                                Enter Payment</button>
                                        </div>
                                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                            <button type="button" class="btn px-0"><i
                                                    class="icon-book-open mr-2"></i>Create Invoice</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
@endsection