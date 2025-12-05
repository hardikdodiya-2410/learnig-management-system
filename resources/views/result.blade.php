<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
        function confirmLogout() {
          Swal.fire({
          title: 'Are you sure you want to logout?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, Logout',
          cancelButtonText: 'Cancel',
          reverseButtons: true
        }).then((result) => {
              if (result.isConfirmed) {
                  document.getElementById('logout-form').submit();
              }
          });
      }

    function reloadCaptcha() {
        fetch('/reload-captcha')
            .then(res => res.json())
            .then(data => {
                document.getElementById('captchaText').textContent = data.captcha;
            });
    }






function printResult() {
    var printContents = document.getElementById('resultContent').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload(); 
}
function downloadPDF() {
    const element = document.getElementById('resultContent');

    // Temporarily apply styles only for PDF
    const tables = element.querySelectorAll("table");
    const cells = element.querySelectorAll("table th, table td");

    tables.forEach((table) => {
        table.dataset.originalStyle = table.getAttribute("style") || "";
        table.style.borderCollapse = "collapse";
        table.style.width = "100%";
    });

    cells.forEach((cell) => {
        cell.dataset.originalStyle = cell.getAttribute("style") || "";
        cell.style.border = "1px solid #000";
        cell.style.padding = "8px";
        cell.style.textAlign = "center";
        
        cell.style.fontSize = "12px";
    });

    const opt = {
        margin: 0.4,
        filename: 'student-result.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: {
            scale: 2,
            scrollY: 0,
            useCORS: true,
        },
        jsPDF: {
            unit: 'in',
            format: 'a4',
            orientation: 'portrait',
        },
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
    };

    html2pdf().set(opt).from(element).save().then(() => {
        tables.forEach((table) => {
            table.setAttribute("style", table.dataset.originalStyle);
        });
        cells.forEach((cell) => {
            cell.setAttribute("style", cell.dataset.originalStyle);
        });
    });
}

</script>
    </head>
<body class="antialiased">
   <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Search Student Result</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('result') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Select Course</label>
                            <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror" >
                                <option value="">-- Select Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->course_id }}" {{ old('course_id') == $course->course_id ? 'selected' : '' }}>
                                        {{ $course->course_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if(session('course_error'))
                                <div class="text-danger mt-2">{{ session('course_error') }}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="enrollment_no" class="form-label">Enrollment Number</label>
                            <input type="text" name="enrollment_no" id="enrollment_no"
                                class="form-control @error('enrollment_no') is-invalid @enderror"
                                placeholder="Enter 10-digit Enrollment No"
                                value="{{ old('enrollment_no') }}"  minlength="10" maxlength="10">
                            @error('enrollment_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Captcha</label>
                            <div class="d-flex align-items-center mb-2">
                                <span id="captchaText" class="fw-bold fs-5 text-primary border px-3 py-2 bg-white rounded shadow-sm  " style="user-select: none; cursor: text; text-decoration: line-through; ">{{ $captcha }}</span>
                                <button onclick="reloadCaptcha()"  type="button" class="btn btn-primary ms-2 shadow shadow-sm rounded">&#x21bb;</button>
                            </div>
                            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror"
                                   name="captcha" placeholder="Enter captcha" >
                            @error('captcha')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success w-100">Search Result</button>
                    </form>
                </div>
            </div>

                @isset($results)
                    @if($results->isEmpty())
                        <div class="alert alert-warning mt-4">No results found for this student.</div>
                    @else
                        @foreach($results as $result)
                            <div class="card mt-4" >
                                <div class="card-body" id="resultContent">
                                    <h3 class="text-center mb-4 fw-bold">Student Results</h3>

                                    <table class="table table-bordered w-75 mx-auto mb-4">
                                        <tr>
                                            <th>Student Name:</th>
                                            <td>{{ strtoupper($user->name ?? 'N/A') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Course Name:</th>
                                            <td>{{ $result->course_name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Create Date:</th>
                                            <td>{{ \Carbon\Carbon::parse($result->created_at)->format('d M Y') }}</td>
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
                                                    <th rowspan="2" class="align-middle">Subject</th>
                                                    <th colspan="2">Exam</th>
                                                    <th rowspan="2" class="align-middle">Result</th>
                                                </tr>
                                                <tr>
                                                    <th>Marks</th>
                                                    <th>Obtained Marks</th>
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
                                                                @if($item['marks'] >= 90)
                                                                    +A
                                                                @elseif($item['marks'] >= 80)
                                                                    A
                                                                @elseif($item['marks'] >= 70)
                                                                    B
                                                                @elseif($item['marks'] >= 60)
                                                                    C
                                                                @elseif($item['marks'] >= 50)
                                                                    D
                                                                @else
                                                                    F
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                <tr class="fw-bold table-secondary">
                                                    <td>Grand Total</td>
                                                    <td>{{ $maxTotal }}</td>
                                                    <td>{{ $result->total_marks }}</td>
                                                    <td>
                                                        @if(strtolower($result->result) === 'pass')
                                                            <span class="text-success">PASS</span>
                                                        @else
                                                            <span class="text-danger">FAIL</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                     
                                        </table>
                                        
                                    @else
                                        <div class="alert alert-warning">No marks data available.</div>
                                    @endif
                                </div>
                                <div class="row ">
                                    <div class="col text-start m-3 ">
                                        <button class="btn btn-primary" onclick="printResult()">
                                            <i class="bi bi-printer me-1"></i> Print
                                        </button>
                                    </div>
                                    <div class="col text-end m-3">
                                        <button class="btn btn-success" onclick="downloadPDF()">
                                            <i class="bi bi-download me-1"></i> Download PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endisset
        </div>
    </div>
</div>
</body>
</html>
