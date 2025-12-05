@extends('layouts.app')

@section('title', 'Edit Marks')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Marks for {{ $user->name }}</h2>

    <form action = "{{ route('admin.editmarks', $studentResult->id) }}" method="POST" class="bg-light p-4 shadow rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Student Name</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
        </div>

        <div class="mb-3">
            <label>Course Name</label>
            <input type="text" class="form-control" value="{{ $course->name ?? $studentResult->course_name }}" readonly>
        </div>

        <div class="row">
            @foreach ($marksData as $item)
                <div class="col-md-6 mb-3">
                    <span class="form-control fw-semibold">{{ $item['subject'] }}</span></div>
                <div class="col-md-6 mb-3">
                    <input type="hidden" name="subjects[]" value="{{ $item['subject'] }}">
                    <input type="number" name="marks[]" value="{{ $item['marks'] }}" class="form-control mark-input" min="0" max="100" required>
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <label>Total Marks</label>
                <input type="number" id="total_marks_input" name="total_marks" class="form-control" value="{{ $studentResult->total_marks }}" readonly>
            </div>
            <div class="col-md-3">
                <label>Percentage</label>
                <input type="text" id="percentage_input" name="percentage" class="form-control" value="{{ $studentResult->percentage }}" readonly>
            </div>
            <div class="col-md-3">
                <label>Grade</label>
                <input type="text" id="grade_input" name="grade" class="form-control" value="{{ $studentResult->grade }}" readonly>
            </div>
            <div class="col-md-3">
                <label>Result</label>
                <input type="text" id="result_input" name="result" class="form-control" value="{{ $studentResult->result }}" readonly>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Marks</button>
    </form>
</div>
@endsection

<script>
function calculateSummary() {
    let total = 0;
    let count = 0;
    let isFail = false;

    document.querySelectorAll('.mark-input').forEach(input => {
        const val = parseFloat(input.value);
        if (!isNaN(val)) {
            total += val;
            count++;
            if (val < 50) isFail = true;
        }
    });

    const percentage = count > 0 ? (total / count) : 0;
    let grade = '';
    const result = isFail ? 'Fail' : 'Pass';

    if (percentage >= 90) grade = 'A+';
    else if (percentage >= 80) grade = 'A';
    else if (percentage >= 70) grade = 'B';
    else if (percentage >= 60) grade = 'C';
    else if (percentage >= 50) grade = 'D';
    else grade = 'F';


    document.getElementById('total_marks_input').value = total;
    document.getElementById('percentage_input').value = percentage.toFixed(2);
    document.getElementById('grade_input').value = grade;
    document.getElementById('result_input').value = result;
}


document.addEventListener('DOMContentLoaded', function () {
    calculateSummary();


    document.querySelectorAll('.mark-input').forEach(input => {
        input.addEventListener('input', calculateSummary);
        input.addEventListener('change', calculateSummary);
    });
});
</script>


