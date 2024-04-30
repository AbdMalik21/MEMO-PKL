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