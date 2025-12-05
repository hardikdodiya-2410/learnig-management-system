@extends('layouts.app')

@section('title', 'Add Marks')

@section('content')
<div class="container mt-5">
    <h2>Add Marks for {{ $user->name }}</h2>

    <form action="{{ route('admin.addmarks', $user->id) }}" method="POST" class="p-4 bg-light shadow rounded">
        @csrf

        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="course_id" value="{{ $course->id ?? '' }}">
        <input type="hidden" name="course_name" value="{{ $course->name ?? '' }}">

        <div class="mb-3">
            <label>Student Name:</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
        </div>

        <div class="mb-3">
            <label>Course Name:</label>
            <input type="text" class="form-control" value="{{ $course->name ?? '' }}" readonly>
        </div>

        <div class="row">
            @foreach ($subjects as $subject)
                <div class="col-md-6 mb-3">
                    <input type="hidden" name="subjects[]" value="{{ $subject }}">
                    <span class="form-control fw-semibold">{{ $subject }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="number" name="marks[]" class="form-control mark-input" placeholder="Enter marks of {{ $subject }}" required min="0" max="100">
                </div>
            @endforeach
        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <label>Total Marks</label>
                <input type="number" id="total_marks_input" name="total_marks" class="form-control" placeholder=" total marks" readonly required>
            </div>
            <div class="col-md-3">
                <label>Percentage</label>
                <input type="text" id="percentage_input" name="percentage" class="form-control" placeholder="percentage" readonly required>
            </div>
            <div class="col-md-3">
                <label>Grade</label>
                <input type="text" id="grade_input" name="grade" class="form-control"  placeholder="grade" readonly required>
            </div>
            <div class="col-md-3">
                <label>Result</label>
                <input type="text" id="result_input" name="result" class="form-control" placeholder="result" readonly required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save Marks</button>
    </form>
</div>
@endsection

<script>
function calculateSummary() {
    let total = 0;
    let count = 0;
    let isFail = false;

    document.querySelectorAll('.mark-input').forEach(input => {
        let val = parseFloat(input.value);
        if (val > 100) input.value = 100;
        if (val < 0 && input.value !== "") input.value = 0;
        if (!isNaN(val)) {
            total += val;
            count++;
            if (val < 50) isFail = true;
        }
    });

    const percentage = count > 0 ? (total / (count * 100)) * 100 : 0;
    let grade = '';
    let result = isFail ? 'Fail' : 'Pass';

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

document.addEventListener('input', function (e) {
    if (e.target.classList.contains('mark-input')) {
        calculateSummary();
    }
});
</script>
