<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
         @include('layouts.sidebar')
            <!-- overlay to close sidebar on small screens -->
            <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
            <!-- note: in the layout margin auto is the key as sidebar is fixed -->
            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
                <!-- top nav -->
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <!-- main content -->
                <main class="container-fluid">
                    <section class="row">
                        <div class="col-md-6 col-lg-4">
                            <!-- card -->
                            <article class="p-4 rounded shadow-sm border-left
                     mb-4">
                                <a href="{{ url('/mark') }}" class="d-flex align-items-center">
                                    <span class="bi bi-person-check "></span>

                                    <h5 class="ml-2">Mark Attendence</h5>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <article class="p-4 rounded shadow-sm border-left mb-4">
                                <a href="{{url('leave')}}" class="d-flex align-items-center">
                                    <span class="bi bi-person "></span>
                                    <h5 class="ml-2">Mark Leave</h5>
                                </a>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <article class="p-4 rounded shadow-sm border-left mb-4">
                                <a href="{{('view')}}" class="d-flex align-items-center">
                                    <span class="bi bi-box "></span>
                                     <h5 class="ml-2">View</h5>
                                </a>
                            </article>
                        </div>
                    </section>


            </div>
            </main>
        </div>
    </div>
    </div>
</x-app-layout>
