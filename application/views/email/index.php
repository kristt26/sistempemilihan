<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    <style>
    /* -------------------------------------
        INLINED WITH htmlemail.io/inline
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
        }

        #MessageViewBody a {
            color: inherit;
            text-decoration: none;
            font-size: inherit;
            font-family: inherit;
            font-weight: inherit;
            line-height: inherit;
        }

        .btn-primary table td:hover {
            background-color: #34495e !important;
        }

        .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important;
        }
    }

    .header {
        width: 100%;
        padding-right: 7.5px;
        padding-left: 7.5px;
        margin-right: auto;
        margin-left: auto;
    }

    @media (min-width: 576px) {
        .header {
            max-width: 540px;
        }
    }

    @media (min-width: 768px) {
        .header {
            max-width: 720px;
        }
    }

    @media (min-width: 992px) {
        .header {
            max-width: 960px;
        }
    }

    @media (min-width: 1200px) {
        .header {
            max-width: 1140px;
        }
    }

    hr {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #ccc;
        margin: 1em 0;
        padding: 0;
        border-color: rgb(68, 114, 196);
        /* font-family: sans-serif:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
    }

    .d-flex {
        display: -ms-flexbox !important;
        display: flex !important;
    }

    .justify-content-between {
        -ms-flex-pack: justify !important;
        justify-content: space-between !important;
    }
    th {
  text-align: left;
}
    </style>
</head>

<body>

    <div class="wrapper"
        style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
        <div class="d-flex justify-content-between">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Logo_BUMN_Untuk_Indonesia_2020.svg/1024px-Logo_BUMN_Untuk_Indonesia_2020.svg.png" alt="" width="160px">
            <img src="https://www.telkom.co.id/data/image_upload/page/1594112773573_compress_PNG%20Logo%20Sekunder%20Telkom.png" alt="" width="160px">
        </div>
        <div class="header" style="padding-right: 7.5px;">
            <hr>
            <h4 style="color: rgb(68, 114, 196); text-align:center">INDIHOME CUSTOMER GATHERING
            </h4>
            <hr>
        </div>
        <h1 style="font-family: Calibri; font-size: 45px; text-align:center;">
            SELAMAT</h1>
        <p style="font-family: Calibri; font-size: 20px; text-align:center;">
            Kepada <br> <strong><?= $data['nama'];?></strong> <br> Id: <?= $data['idpelanggan'];?> <br> Alamat:
            <?= $data['alamat'];?> <br> hp. <?= $data['hp'];?></p>
        <p style="font-family: Times New Roman; font-size: 25px; text-align:center;">
            Terimakasih telah menjadi pelanggan setia kami,
        </p>

        <p style="font-family: Times New Roman; font-size: 20px;">
            Mohon kesediaaanya hadir dalam INDIHOME CUSTOMER GATHERING, yang akan
            diselenggarakan pada: <br>
        <table>
            <tr>
                <th width="100px">
                    Hari
                </th>
                <th>
                    : <?= $info['hari'];?>
                </th>
            </tr>
            <tr>
                <th>
                    Tempat
                </th>
                <th>
                    : <?= $info['tempat'];?>
                </th>
            </tr>
        </table><br>
    </p>
    <p style="font-family: Times New Roman; font-size: 20px;">
        Kehadiran anda sangat kami nantikan.
    </p>
    </div>
    <table border="0" cellpadding="0" cellspacing="0" class="body"
        style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
        <tr>
            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
            <td class="container"
                style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; padding: 10px;">
                <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; padding: 10px;">


                    <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                        <span class="apple-link"
                            style="color: #999999; font-size: 12px; text-align: center;">Untuk info lebih lanjut, hubungi admin kami di 0967-343433</span>
                    </div>
                    <!-- END FOOTER -->

                    <!-- END CENTERED WHITE CONTAINER -->
                </div>
            </td>
            <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        </tr>
    </table>
</body>

</html>