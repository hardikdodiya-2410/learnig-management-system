@extends('layouts.app')

@section('title', 'Add New Course')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Course</h2>
        <a href="{{ route('admin.viewcourse') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Back to Courses
        </a>
    </div>
   <form id="courseForm" action="{{ route('admin.storecourse') }}" method="POST" class="shadow p-4 bg-light rounded">
        @csrf
        <ul class="nav nav-pills nav-justified mb-5" id="wizardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-step1" data-bs-toggle="pill" data-bs-target="#step1" type="button" role="tab">Step 1: Add Course</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link disabled" id="tab-step2" data-bs-toggle="pill" data-bs-target="#step2" type="button" role="tab" disabled>Step 2: Add Subject</button>
            </li>
        </ul>
        <div class="tab-content" id="wizardContent">
            <div class="tab-pane fade show active" id="step1" role="tabpanel">
                <h4 class="mb-3">Course Details</h4>

                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter course name" value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <div class="d-flex gap-2">
                        <input type="number" id="duration_in_no" class="form-control" placeholder="Number"  value="{{ old('duration_in_no') }}">
                        <select id="duration_type" class="form-select">
                            <option value="days" {{ old('duration_type')=='days' ? 'selected' : '' }}>Days</option>
                            <option value="months" {{ old('duration_type')=='months' ? 'selected' : '' }}>Months</option>
                            <option value="years" {{ old('duration_type')=='years' ? 'selected' : '' }}>Years</option>
                        </select>
                    </div>
                    <input type="hidden" name="duration" id="duration" value="{{ old('duration') }}">
                    @error('duration') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-control" placeholder="Enter course description">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-primary" onclick="goToStep(2)">Next <i class="bi bi-arrow-right-circle ms-1"></i></button>
                </div>
            </div>

            <div class="tab-pane fade" id="step2" role="tabpanel">

                <h4 class="mb-3">Add Course Subjects</h4>
                <div class="mb-3">
                    <button class="btn btn-primary" type="button" onclick="addSubjectField()"><i class="bi bi-plus-circle me-1"></i> Add Subject</button>
                </div>
                <div id="subjectFields">
                    <div class="mb-3" >
                        <label class="form-label">Subjects</label>
                        <input type="text" name="subjects[]" class="form-control" placeholder="Enter subject" value="{{ old('subjects.0') }}">

                        @error('subjects') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="goToStep(1)"><i class="bi bi-arrow-left-circle me-1"></i> Back</button>
                     <button type="button" class="btn btn-success" onclick="submitForm()">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const durationInNoInput = document.getElementById('duration_in_no');
         document.getElementById('duration_in_no').addEventListener('input', function () {
        const input = this;
        if (parseInt(input.value) < 1) {
            input.value = '';
        }
    });   
    const durationTypeSelect = document.getElementById('duration_type');
    const durationInput = document.getElementById('duration');

    function updateDuration() {
        durationInput.value = durationInNoInput.value + ' ' + durationTypeSelect.value;
    }

    durationInNoInput.addEventListener('input', updateDuration);
    durationTypeSelect.addEventListener('change', updateDuration);

    updateDuration(); 

    function goToStep(step) {

        if (step === 2) {
            const courseName = document.querySelector('input[name="name"]').value.trim();
            const durationNo = durationInNoInput.value.trim();
            const durationType = durationTypeSelect.value.trim();
            const description = document.querySelector('textarea[name="description"]').value.trim();

            if (!courseName || !durationNo || !durationType || !description) {
            Swal.fire({
                icon: 'warning',
                title: 'Incomplete Course Details',
                text: 'Please fill in all required fields before proceeding.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }
            updateDuration();
        }
        const nextTab = document.querySelector(`#tab-step${step}`);
        nextTab.classList.remove('disabled');
        nextTab.removeAttribute('disabled');

        const tabTrigger = new bootstrap.Tab(nextTab);
        tabTrigger.show();
    }


    document.querySelectorAll('.nav-link').forEach(btn => {
        btn.addEventListener('click', function (e) {
            if (this.classList.contains('disabled')) {
                e.preventDefault();
                e.stopPropagation();
            }
        });
    });

    function submitForm() {
    const subjectInputs = document.querySelectorAll('input[name="subjects[]"]');
    let hasSubject = false;

    subjectInputs.forEach(input => {
        if (input.value.trim() !== '') {
            hasSubject = true;
        }
        else {
            hasSubject = false;
        }
    });

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
                document.getElementById('courseForm').submit();
            }
        });
    }

    function addSubjectField() {
            const subjectFieldContainer = document.querySelector('#subjectFields');

            const newSubjectField = document.createElement('div');
            newSubjectField.classList.add('mb-3');

            newSubjectField.innerHTML = `
                <div class="d-flex gap-2">
                    <input type="text" name="subjects[]" class="form-control" placeholder="Enter a subject">
                    <button type="button" class="btn btn-danger" onclick="removeSubjectField(this)">Remove</button>
                </div>
            `;

            subjectFieldContainer.appendChild(newSubjectField);
        }


    function removeSubjectField(button) {
        button.closest('.mb-3').remove();
    }


</script>


@endsection
