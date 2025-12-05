@extends('layouts.app')

@section('title', 'View Results')

@section('content')

<div class="container mt-4 border p-4">
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>
    <h2 class="mb-4 text-center">Student Results</h2>
    @if($results->isEmpty())
        <div class="alert alert-info">No results found for this student.</div>
    @else
        @foreach($results as $result)
            <table class="table table-bordered w-75 mx-auto mb-4">
                <tr>
                    <th>Student Name:</th>
                    <td>{{ strtoupper($result->user->name ?? 'N/A') }}</td>
                </tr>
                <tr>
                    <th>Course Name:</th>
                    <td>{{ $result->course->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Create Date</th>
                    <td>{{ $result->created_at->format('d M Y') }}</td>
                </tr>
            </table>
            @php 
                $marks = json_decode($result->marks, true); 
                $subjectCount = is_array($marks) ? count($marks) : 0;
                $maxTotal = $subjectCount * 100;
            @endphp
            @if(is_array($marks))
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th rowspan="2" class="align-content-center">Subject</th>
                            <th colspan="2">Exam</th>
                            <th rowspan="2" class="align-content-center">Result</th>
                        </tr>
                        <tr>
                            <th> Marks </th>
                            <th> Obtained Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($marks as $item)
                            @if(isset($item['subject']) && isset($item['marks']))
                                <tr>
                                    <td>{{ $item['subject'] }}</td>
                                    <td>100</td>
                                    <td>{{ $item['marks'] }}</td>
                                    <td>
                                        @if($item['marks'] >=90)
                                                +A
                                        @elseif($item['marks'] >=80)
                                            A
                                        @elseif($item['marks'] >=70)
                                            B
                                        @elseif($item['marks'] >=60)
                                            C
                                        @elseif($item['marks'] >=50)
                                            D
                                        @else
                                            F
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr class="fw-bold">
                            <td>Grand Total</td>
                            <td>{{ $maxTotal }}</td>
                            <td>{{ $result->total_marks }}</td>
                            <td colspan="2">
                                @if(strtolower($result->result) == 'pass')
                                    <span >PASS</span>
                                @else
                                    <span >FAIL</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p class="text-muted text-center">Result not available</p>
            @endif
        @endforeach
    @endif
</div>
@endsection
