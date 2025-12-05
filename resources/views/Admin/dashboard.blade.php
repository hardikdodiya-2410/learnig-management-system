@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  @php
    $role = auth()->user()->role; 
  @endphp
<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>
    <div class="container mt-5">
            <div class="row g-5">
                <div class="col-md-8">
                    <div class="card text-white bg-primary h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Students</h5>
                            <h2>{{ $studentCount }}</h2>
                            <i class="bi bi-people-fill fs-1"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Teachers</h5>
                            <h2>{{ $teacherCount }}</h2>
                            <i class="bi bi-check-circle-fill fs-1"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Total Courses</h5>
                            <h2>{{ $courseCount }}</h2>

                            <i class="bi bi-book-fill fs-1"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <a  class="text-decoration-none" href="https://www.google.com/maps/place/Infinity+Softech/@21.7376961,72.1350104,770m/data=!3m1!1e3!4m16!1m9!3m8!1s0x395f515a0ab81397:0xb8717e6ab1508848!2sInfinity+Softech!8m2!3d21.7376912!4d72.1398813!9m1!1b1!16s%2Fg%2F11t1fzwgw8!3m5!1s0x395f515a0ab81397:0xb8717e6ab1508848!8m2!3d21.7376912!4d72.1398813!16s%2Fg%2F11t1fzwgw8?hl=en-US&entry=ttu&g_ep=EgoyMDI1MDYwNC4wIKXMDSoASAFQAw%3D%3D">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Locations</h5>
                            <h2>Infinity Softech</h2>
                            <i class="bi bi-geo-alt-fill fs-1"></i>
                        </div>
                    </div>
                  </a>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
