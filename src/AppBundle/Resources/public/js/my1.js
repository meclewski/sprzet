
  $(document).ready(function() {
   var table = $('#table').DataTable( {
            "scrollX": true,
            "language": {
            "lengthMenu": "Wyświetl _MENU_ rekordów na stronę",
            "zeroRecords": "Przepraszamy nic nie znaleziono",
            "info": "Strona _PAGE_ z _PAGES_",
            "infoEmpty": "Brak psujących rekordów",
            "infoFiltered": "(Odfiltrowane z _MAX_ rekordów)",
            "search":         "Wyszukaj:",
            "paginate": {
                "first":      "Pierwsza",
                "last":       "ostatnia",
                "next":       "Natępna",
                "previous":   "Poprzednia"
                   },
        }
    } );
    

  
     
    $('#table tbody').on('dblclick', 'tr', function () {
        var data = table.row( this ).data();
        location.replace("https://www.w3schools.com");
 
    } );
 } );



