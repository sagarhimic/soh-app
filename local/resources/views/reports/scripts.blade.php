@push('scripts')
<script>
function filters() {
	var search_key = $("#search_key").val().trim();
	var category   = $("#category").val();
	var date     = $("#date").val();
	var min_months     = $("#min_months").val();
	var tot_min_months     = $("#tot_min_months").val();
	var per_page       = $("#per_page").val();
    return { search_key: search_key, category: category, date: date, min_months : min_months, tot_min_months : tot_min_months, per_page: per_page };
}

function search(page) {
	
	queryRemove();
	
	$.ajax({
		url: "{{ url('/stock-report') }}?page=" + page,
		type: "GET",
		beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
            if (token) {
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: filters(),
        success: function(data) {
            $('.search-results').html(data);
            $("#preloader").hide();
        },
        error: function() {
            $("#preloader").hide();
		}
	});
}

$(document).ready(function() {

    $('#category').on('change', function() {
        search(1);
    });

    search(1);

    $('#search_key').keypress(function (event) {
        if (event.keyCode == 13) {
            search(1);
            event.preventDefault();
        }
    });

    $('#search_key').keyup(function () {
        if ($(this).val().trim().length === 0 ) {
            search(1);
        }
    });

    $("#sform").on('reset',function(e){
        setTimeout(function(){
            $("#search_key").val('');
            search(1);
            $(".input_search_icon").removeClass("input_clear_icon");
        },500);
    });

    $('.onX').on('click', function() {
        search(1);
    });

    $(document).on('click', '.search-results .pagination a', function (e) {
        e.preventDefault();
        search($(this).attr('href').split('page=')[1]);
    });
});
</script>
@endpush
