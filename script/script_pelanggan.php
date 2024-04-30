<script>
function reloadpage()
{
location.reload()
}
</script>
                    <script>
                            //////////////search data
                            function myFunction() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("inputku");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("tabelku");
                                tr = table.getElementsByTagName("tr");
                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[1];//search sesuai array ke 1
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                            function myFunction2() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("inputku1");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("tabelku");
                                tr = table.getElementsByTagName("tr");
                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[9];//search sesuai array ke 1
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                             function myFunction1() {
                                var input, filter, table, tr, td, i, txtValue;
                                input = document.getElementById("inputku1");
                                filter = input.value.toUpperCase();
                                table = document.getElementById("tabelku");
                                tr = table.getElementsByTagName("tr");
                                for (i = 0; i < tr.length; i++) {
                                    td = tr[i].getElementsByTagName("td")[11];//search sesuai array ke 1
                                    tk = tr[i].getElementsByTagName("td")[18];
                                    if (td||tk) {
                                        txtValue = td.textContent || td.innerText;
                                        txtValue1 = tk.textContent || tk.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue1.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                   
                                }
                            }
                            
                             ///////////eksport
                            window.onload = function () {
                                var table = document.getElementById('tabelku'), //id tabel
                                        download = document.getElementById('eksport');//id button

                                download.addEventListener('click', function () {
                                    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(table.outerHTML));
                                });

                            }
                        </script>
                        <div class="modal fade" id="modal_data" tabindex="-1" role="dialog"  aria-hidden="true"></div>

                        <script src="js/jquery-1.11.2.min.js"></script>
                        <!-- js untuk bootstrap -->
                        <script src="js/bootstrap.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('a#edit_data').click(function () {
                                    var url = $(this).attr('href');
                                    $.ajax({
                                        url: url,
                                        success: function (response) {
                                            $('#modal_data').html(response);
                                        }
                                    });
                                });

                            });
                        </script>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('a#tambah_data').click(function () {
                                    var url = $(this).attr('href');
                                    $.ajax({
                                        url: url,
                                        success: function (response) {
                                            $('#modal_data').html(response);
                                        }
                                    });
                                });

                            });
                        </script>

                        <script>
// function sortTable(n) {
//   var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
//   table = document.getElementById("tabelku");
//   switching = true;
//   //Set the sorting direction to ascending:
//   dir = "asc"; 
//   /*Make a loop that will continue until
//   no switching has been done:*/
//   while (switching) {
//     //start by saying: no switching is done:
//     switching = false;
//     rows = table.rows;
//     /*Loop through all table rows (except the
//     first, which contains table headers):*/
//     for (i = 1; i < (rows.length - 1); i++) {
//       //start by saying there should be no switching:
//       shouldSwitch = false;
//       /*Get the two elements you want to compare,
//       one from current row and one from the next:*/
//       x = rows[i].getElementsByTagName("TD")[n];
//       y = rows[i + 1].getElementsByTagName("TD")[n];
//       /*check if the two rows should switch place,
//       based on the direction, asc or desc:*/
//       if (dir == "asc") {
//         if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
//           //if so, mark as a switch and break the loop:
//           shouldSwitch= true;
//           break;
//         }
//       } else if (dir == "desc") {
//         if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
//           //if so, mark as a switch and break the loop:
//           shouldSwitch = true;
//           break;
//         }
//       }
//     }
//     if (shouldSwitch) {
//       /*If a switch has been marked, make the switch
//       and mark that a switch has been done:*/
//       rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
//       switching = true;
//       //Each time a switch is done, increase this count by 1:
//       switchcount ++;      
//     } else {
//       /*If no switching has been done AND the direction is "asc",
//       set the direction to "desc" and run the while loop again.*/
//       if (switchcount == 0 && dir == "asc") {
//         dir = "desc";
//         switching = true;
//       }
//     }
//   }
// }
// </script>
