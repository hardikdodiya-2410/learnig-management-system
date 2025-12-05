@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Course: <span class="text-capitalize">{{ $course->name }}</span></h2>
        <a href="{{ route('admin.viewcourse') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Back to Courses
        </a>
    </div>

    <form id="courseForm" action="{{ route('admin.editcourse', $course->id) }}" method="POST" class="shadow p-4 bg-light rounded">
        @csrf
        @method('PUT')

        <ul class="nav nav-pills nav-justified mb-5" id="wizardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-step1" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab">Step 1: Edit Course</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link disabled" id="tab-step2" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab" disabled>Step 2: Edit Subjects</button>
            </li>
            
        </ul>

        <div class="tab-content" id="wizardContent">
            <div class="tab-pane fade show active" id="step1" role="tabpanel">
                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <div class="d-flex gap-2">
                        <input type="number" id="duration_in_no" class="form-control" value="" placeholder="Number">
                        <select id="duration_type" class="form-select">
                            <option value="days">Days</option>
                            <option value="months">Months</option>
                            <option value="years">Years</option>
                        </select>
                    </div>
                    <input type="hidden" name="duration" id="duration" value="{{ $course->duration }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $course->description }}</textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" onclick="goToStep(2)">Next <i class="bi bi-arrow-right-circle ms-1"></i></button>
                </div>
            </div>

            <div class="tab-pane fade" id="step2" role="tabpanel">
                <h4 class="mb-3">Edit Subjects</h4>
                <div class="mb-3">
                    <button class="btn btn-primary" type="button" onclick="addSubjectField()">
                        <i class="bi bi-plus-circle me-1"></i> Add Subject
                    </button>
                </div>
                <div id="subjectFields">
                    @foreach(json_decode($course->subjects, true) as $subject)
                        <div class="mb-3">
                            <div class="d-flex gap-2">
                                <input type="text" name="subjects[]" class="form-control" value="{{ $subject }}">
                                <button type="button" class="btn btn-danger" onclick="removeSubjectField(this)">Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="goToStep(1)"><i class="bi bi-arrow-left-circle me-1"></i> Back</button>
                    <button type="button" class="btn btn-success" onclick="submitForm()">Update Course</button>
                </div>
            </div>

            
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const durationHidden = document.getElementById('duration');
        const durationNo = document.getElementById('duration_in_no');
        const durationType = document.getElementById('duration_type');
        const val = durationHidden.value.trim();
        const spaceIndex = val.indexOf(' ');
        if (spaceIndex > 0) {
            durationNo.value = val.slice(0, spaceIndex);
            durationType.value = val.slice(spaceIndex + 1).toLowerCase();
        }
        function updateHidden() {
            durationHidden.value = durationNo.value.trim() + ' ' + durationType.value.trim();
        }
        durationNo.addEventListener('input', updateHidden);
        durationType.addEventListener('change', updateHidden);
    });

    function goToStep(step) {
        if (step === 2) {
            const name = document.querySelector('input[name="name"]').value.trim();
            const no = document.getElementById('duration_in_no').value.trim();
            const type = document.getElementById('duration_type').value.trim();
            const desc = document.querySelector('textarea[name="description"]').value.trim();
            if (!name || !no || !type || !desc) {
                Swal.fire({
                     icon: 'warning',
                     title: 'Incomplete Fields',
                     text: 'Please fill in all course details.' 
                    });
                return;
            }
        }
    
        const nextTab = document.querySelector(`#tab-step${step}`);
        nextTab.classList.remove('disabled');
        nextTab.removeAttribute('disabled');
        new bootstrap.Tab(nextTab).show();
    }
     function submitForm(formId = 'courseForm') {
        const subjectInputs = document.querySelectorAll('input[name="subjects[]"]');
        let hasSubject = false;


        for (const input of subjectInputs) {
            if (input.value.trim() !== '') {
                hasSubject = true;
                break;
            }
        }

        if (!hasSubject) {
            Swal.fire({
                icon: 'warning',
                title: 'Missing Subject',
                text: 'Please enter at least one subject before submitting.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to submit this course and its subjects?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Yes, submit',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("Submitting form...");
                document.getElementById(formId).submit();
            }
        });
    }
    function addSubjectField() {
        const container = document.getElementById('subjectFields');
        const div = document.createElement('div');
        div.classList.add('mb-3');
        div.innerHTML = `<div class="d-flex gap-2">
            <input type="text" name="subjects[]" class="form-control" placeholder="Enter subject">
            <button type="button" class="btn btn-danger" onclick="removeSubjectField(this)">Remove</button>
        </div>`;
        container.appendChild(div);
    }

    function removeSubjectField(button) {
        button.closest('.mb-3').remove();
    }
</script>
@endsection
