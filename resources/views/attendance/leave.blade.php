<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
            <!-- note: in the layout margin auto is the key as sidebar is fixed -->
            <div class="col-md-9 col-lg-10 ml-md-auto px-0">
                <!-- top nav -->

                <!-- main content -->
                <main class="container-fluid">
                    <section class="row">
                        <div class="col-md-6 col-lg-4">
                            <form action="{{ route('leave.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>

                                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" readonly>



                                </div>
                                <div class="form-group">
                                    <label for="student_id">Student ID</label>
                                    <input type="text" class="form-control" id="student_id" name="student_id"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <button type="submit" class="btn btn-primary text-dark">Mark Leave</button>
                            </form>
                            <br>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
