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


                            <form action="{{ route('attendance.show') }}" method="GET">
                                @csrf
                                <div class="form-group">
                                    <label for="student_id">Student ID</label>
                                    <input type="text" class="form-control" id="student_id" name="student_id" required>
                                </div>
                                <button type="submit" class="btn btn-primary text-dark">View Attendance</button>
                            </form>

                        </div>


                    </section>
                </main>

            </div>
        </div>
    </div>
</x-app-layout>
