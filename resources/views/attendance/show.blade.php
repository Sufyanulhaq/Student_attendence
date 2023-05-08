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


                        @if($attendances->count() > 0)
                        <h2>Attendance for Student ID {{ $attendances[0]->student_id }}</h2>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->date }}</td>
                                    <td>{{ $attendance->student_id }}</td>
                                    <td>{{ $attendance->name }}</td>
                                    <td>{{ $attendance->attendence }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>No attendance records found for the given student ID</p>
                        @endif
                    </section>
                </main>

            </div>
        </div>
    </div>
</x-app-layout>
