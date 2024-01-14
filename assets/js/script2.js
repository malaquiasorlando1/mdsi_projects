$(document).ready(function() {
    $('#searchInput').on('input', function() {
      var searchText = $(this).val().toLowerCase();

      $.ajax({
        url: 'get_filtered_eleitores.php',
        method: 'POST',
        data: {
          searchText: searchText
        },
        success: function(response) {
          $('#eleitoresTable').html(response);
        }
      });
    });
  });