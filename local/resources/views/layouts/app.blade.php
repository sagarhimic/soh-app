<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOH Application</title>

    <!-- Bootstrap 5.3 CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">

    <!-- jQuery MUST LOAD FIRST -->
    <script src="{{ url('assets/jquery/jquery.min.js') }}"></script>

    <!-- tableHeadFixer plugin -->
    <script src="{{ url('assets/vendor/tableHeadFixer.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark nav-height" aria-label="Third navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SOH System</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Dashboard
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ url('/stock-report') }}">Stock Report</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Stacks
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/stocks') }}">Stocks</a></li>
                            <li><a class="dropdown-item" href="{{ route('stock.import.form') }}">Stock Import</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Items List
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/items') }}">Items</a></li>
                            <li><a class="dropdown-item" href="{{ url('/items-upload') }}">Items Import</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid p-3">
        @yield('content')
    </div>

    <!-- Modal -->
    <div class="modal confirm-modal fade" id="dashboard_modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" id="dashboard_content"></div>
        </div>
    </div>

    <!-- Your General Scripts -->
    
    <!-- Bootstrap JS (correct path) -->
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
function dashboardPopup(url) {
    $("#preloader").show();
    $("#dashboard_content").html('');

    $("#dashboard_content").load(url, function () {
        setTimeout(function () {
            $("#preloader").hide();
            $("#dashboard_modal").modal('show');
        }, 500);
    });
}
   

function queryRemove() {
			var uri = window.location.toString();
			if ( uri.indexOf( "?" ) > 0 ) {
				var clean_uri = uri.substring( 0, uri.indexOf( "?" ) );
				window.history.replaceState( {}, document.title, clean_uri );
			}

			/* 	if (window.location.href.match(/filterby=/) || window.location.href.match(/page=/)){
				    if (typeof (history.pushState) != "undefined") {
				        var obj = { Title: document.title, Url: window.location.pathname };
				        history.pushState(obj, obj.Title, obj.Url);
				    } else {
				        window.location = window.location.pathname;
				    }
				} */
		}


</script>
    <!-- Page Specific Scripts -->
    @stack('scripts')

</body>
</html>
