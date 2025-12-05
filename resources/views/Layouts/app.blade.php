
<html>
<head>

  <title>Admin Panel - @yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .content-wrapper {
      flex: 1;
      display: flex;
    }

        .fl-flasher.fl-success {
            background: #fefefe !important;
            color: #1d1d1f !important;
            border-left: 6px solid #007aff !important;

            padding: 16px 24px !important;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif !important;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15) !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
        }

        .fl-icon {
            background: #e0f0ff !important;
            color: #007aff !important;
            border-radius: 50% !important;
           
            font-size: 30px !important;
            flex-shrink: 0 !important;
        }

        .fl-close {
            background: transparent !important;
            border: none !important;
            color: #555 !important;
            font-weight: bold !important;
            font-size: 16px !important;
            margin-left: auto !important;
            cursor: pointer !important;
        }

        .fl-progress-bar {
            background-color: #007aff !important;
            height: 4px !important;
            border-radius: 0 0 10px 10px !important;
            margin-top: 6px    !important;
        }
        .fl-success .fl-progress-bar .fl-progress {
            background-color:rgb(255, 255, 255) !important;
  
        }
        .fl-flasher.fl-success .fl-title
        {
            color: #007aff !important;

        }
        
  </style>
</head>
<body id="page-top">

  <div class="content-wrapper">
    @include('layouts.header')


    <main class="flex-grow-1 p-4">
      @yield('content')
    </main>
  </div>

  @include('layouts.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
