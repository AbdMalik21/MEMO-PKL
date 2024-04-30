 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script language="JavaScript">
                            function disableEnterKey(e)
                            {
                                var key;
                                if (window.event)
                                    key = window.event.keyCode; //IE
                                else
                                    key = e.which; //firefox
                                if (key == 13)
                                    return false;
                                else
                                    return true;
                            }
        </script>
        <script>
            $(function () {
                $("#idpelku").change(function () {
                    var idpel = $("#idpelku").val();

                    $.ajax({
                        url: '../proses/prosespergantian.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'idpel': idpel// dalam petik untuk ke proses.php  
                        },
                        success: function (pelanggan) {
                            $("#nama").val(pelanggan['nama']);
                            $("#alamat").val(pelanggan['alamat']);
                            $("#notlp").val(pelanggan['notlp']);
                            $("#meter_lama").val(pelanggan['idmet']);
                            $("#keluhan").val(pelanggan['keluhan']);
                        }
                    });
                });
            });
        </script>
        <script>
            //////////////search data
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("idpelku");
                filter = input.value.toUpperCase();
                table = document.getElementById("tabel_modal");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];//search sesuai array ke 1
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
        </script>