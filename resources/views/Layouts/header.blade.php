@php
    $user = auth()->user();
@endphp

<nav id="sidebarMenu"class="col-md-3 col-lg-2 d-md-block bg-dark">
    <div class="position-sticky pt-3 text-white">
        @role('Super Admin')
            <h4 class="text-center py-3 border-bottom border-secondary">Super Admin Panel</h4>
        @endrole
        @role('Teacher')
            <h4 class="text-center py-3 border-bottom border-secondary">Teacher Dashboard</h4>
        @endrole
        @role('Student')
            <h4 class="text-center py-3 border-bottom border-secondary">Student Section</h4>
        @endrole

        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a class="nav-link text-white mt-3" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-house-fill fs-4 me-2 pe-2"></i>Dashboard
                </a>
            </li>
            @can('view course')
            <li class="nav-item">
                <a class="nav-link text-white mt-3" href="{{ route('admin.viewcourse') }}">
                     <i class="bi bi-book-fill fs-5 me-2 pe-2"></i>View Course
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white mt-3" href="{{ route('admin.results') }}">
                     <i class="bi bi-book-fill fs-5 me-2 pe-2"></i>Result
                </a>
            </li>
            @endcan

            @canany(['view teacher', 'view student'])
                <li class="nav-item">
                    <a class="nav-link text-white mt-3" href="{{ route('admin.viewuser') }}">
                         <i class="bi bi-people-fill fs-5 me-2 pe-2"></i>View User
                    </a>
                </li>
            @endcanany

            @can('view role')
                <li class="nav-item">
                    <a class="nav-link text-white mt-3" href="{{ route('admin.viewrole') }}">
                         <i class="bi bi-person-badge-fill fs-5 me-2 pe-2"></i>View Role
                    </a>
                </li>
            @endcan
            @can('view all results')
            <li class="nav-item">
                    <a class="nav-link text-white mt-3" href="{{ route('admin.viewresults') }}">
                       <i class="bi bi-bar-chart-line-fill fs-5 me-2 pe-2"></i>View result
                    </a>
            </li>
            @endcan
          @can('view Profile')
            <li class="nav-item">
                <a class="nav-link text-white mt-3" href="{{ route('Student.profilestudent', $user->id) }}">
                    <i class="bi bi-person-lines-fill fs-5 me-2 pe-2"></i>View Profile
                </a>
            </li>
         @endcan

            <li class="nav-item mt-auto mt-3">
                <button type="button" onclick="confirmLogout()" class="nav-link text-white w-100 text-start btn btn-link mt-3">
                     <i class="bi bi-box-arrow-right  fs-5 me-2 pe-2"></i>Logout
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</nav>
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

