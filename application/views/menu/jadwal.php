</html>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery-3.3.1.js"></script>

<div class="container">
    <!-- Trigger the modal with a button -->

    <td style="text-align:center">
        <?php echo form_input($tanggal) ?>
    </td>
</div>
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/css/bootstrap-datepicker.css">
<script src="<?php echo base_url() ?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    const numberWithCommas = (x) => {
        var parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

    $(function() {
        $(document).on("focus", ".tanggal", function() {
            $(this).datepicker({
                startDate: '0',
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd'
            });
        });

        $('.tanggal').on('changeDate', function(ev) {
            tanggal_el = $(this);
            tanggal_val = $(this).val();
            jam_mulai_el = tanggal_el.parent().parent().find(".jam_mulai");
            durasi_el = tanggal_el.parent().parent().find(".durasi");
            jam_selesai_el = durasi_el.parent().parent().find(".jam_selesai");
            loading_container_el = tanggal_el.parent().parent().find(".loading_container");
            lapangan_id_el = tanggal_el.parent().parent().find(".lapangan_id");

            jam_mulai_el.hide();
            loading_container_el.show();

            $.post('<?php echo base_url(); ?>Cart/getJamMulai', {
                    tanggal: tanggal_val,
                    lapangan_id: lapangan_id_el.val()
                }, function(data) {
                    jam_mulai_el.show();
                    loading_container_el.hide();
                    jam_mulai_el.html("");

                    jam_mulai_el.append("<option value='' selected='selected'>- Pilih Jam Mulai -</option>");

                    count = 0;

                    data.forEach(function(item, index) {
                        // console.log(item);
                        jam_mulai_el.append("<option durasi='" + item.durasi + "'>" + item.jam_mulai + "</option>");
                        count++;
                    });

                    durasi_el.val(0);
                    jam_selesai_el.html("");

                    if (count == 0) {
                        jam_mulai_el.html("");
                        jam_mulai_el.append("<option value='' selected='selected'>- Tidak ada pilihan -</option>");
                    }

                },
                'json'
            );
        });

        $(document).on("change", ".jam_mulai", function() {
            jam_mulai_el = $(this);
            durasi_el = jam_mulai_el.parent().parent().find(".durasi");
            durasi_el.val(jam_mulai_el.find(":selected").attr("durasi")).change();
        });

        $(document).on("change keyup", ".durasi", function() {
            durasi_el = $(this);
            durasi = $(this).val();

            if (durasi == "") {
                durasi = 0;
                durasi_el.val(durasi);
            }

            jam_mulai_el = durasi_el.parent().parent().find(".jam_mulai");
            jam_selesai_el = durasi_el.parent().parent().find(".jam_selesai");

            harga_per_jam_el = durasi_el.parent().parent().find(".harga_per_jam");
            subtotal_el = durasi_el.parent().parent().find(".subtotal");

            if (jam_mulai_el.val() != "") {
                jam_selesai = moment("01-01-2018 " + jam_mulai_el.val(), "MM-DD-YYYY HH:mm:ss").add(parseInt(durasi), 'hours').format('HH:mm:ss');
                jam_selesai_el.html(jam_selesai);

                harga_per_jam = harga_per_jam_el.html().replace(/,/g, '');
                harga_per_jam_int = parseInt(harga_per_jam);

                subtotal_el.html(numberWithCommas(harga_per_jam_int * parseInt(durasi)));

                subtotal_bawah = 0;
                $('.subtotal').each(function(i, obj) {
                    a_subtotal_html = $(this).html().trim().replace(/,/g, '');
                    if (a_subtotal_html == "") {
                        a_subtotal_html = "0";
                    }

                    a_subtotal_html_int = parseInt(a_subtotal_html);
                    subtotal_bawah += a_subtotal_html_int;
                });

                <?php if ($this->session->userdata('usertype') == '3') {
                    echo "var disc = '" . $diskon['harga'] . "';"; ?>
                <?php } else {
                    echo "var disc = '0';";
                } ?>

                var diskon = $('#diskon').val();

                $("#subtotal_bawah").html(numberWithCommas(subtotal_bawah));
                $("#diskon").html(numberWithCommas(disc));
                var gtotal = (subtotal_bawah - disc);
                $("#grandtotal").html(numberWithCommas(gtotal));
            }
        });
    });
</script>