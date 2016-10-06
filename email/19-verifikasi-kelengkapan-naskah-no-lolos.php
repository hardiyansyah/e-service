<?php
$txt = '
<table width="100%">
<tbody><tr>
    <td width="50%">
    </td>
    <td style="font-size:12px;padding:10px 0 10px 4px">
        <table style="border-collapse:collapse;border-spacing:0px" cellspacing="0" cellpadding="0" border="0">
            <tbody><tr>
                <td style="padding:15px">
                    <table border="0" align="center" width="700">
                        <tbody><tr>
                            <td>
                                <table align="left" width="180" border="0">
                                    <tbody>
                                        <tr align="left">
                                            <td>
                                                <a href="http://lipi.wisasi.com" target="_blank"><img src="http://lipi.wisasi.com/logo-lipi.png" alt="LIPI Press" height="80px" border="0">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="right" width="500" style="margin-top:50px;border-collapse:collapse" border="0">
                                    <tbody>
                                        <tr align="right">
                                            <td><h1 style="font-size:18px;color:#4c4848;font-weight:bold"><span style="color:rgb(76,72,72);font-weight:bold">Proses Verifikasi Kelengkapan Naskah</span></h1></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
            <tr>
                <td style="background-color:rgb(255,255,255);padding:0px 15px 0px 15px">
                    <p style="border-bottom:1px dotted #efebec;width:100%">&nbsp;</p>
                    <p>Dear <strong>'.$namaPenulis.' (Penulis)</strong>,</p>
                    <p style="margin-bottom:10px;line-height:150%;text-align:justify">
                        Maaf, Naskah Anda <strong>'.$hasil.'</strong>, berikut data naskah tersebut kami informasikan :
                    </p>
                    <table width="700" cellspacing="0" cellpadding="5" style="border:1px solid #dee2e3">
                        <tbody>
                        <tr>
                            <td colspan="5" align="right" valign="top" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3;font-weight:bold;text-align:left"><div align="left">DETAIL NASKAH</div></td>
                        </tr>
                        <tr>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">Judul Naskah</div>
                            </td>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">: '.$judul.'</div>
                            </td>
                        </tr>
                       <!-- <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Uraian Singkat</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$sinopsis.'</strong></div>
                            </td>
                        </tr>-->
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Instansi</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$instansi.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Satuan Kerja</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$satker.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Jumlah Halaman</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$hal.'</strong></div>
                            </td>
                        </tr>
                                              
                        </tbody>
                    </table>
                    <table width="700" cellspacing="0" cellpadding="5" style="border:1px solid #dee2e3">
                        <tbody>
                        <tr>
                            <td colspan="5" align="right" valign="top" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3;font-weight:bold;text-align:left"><div align="left">DETAIL KELENGKAPAN NASKAH (BAHAN AWAL)</div></td>
                        </tr>
                        <tr>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">Halaman Judul</div>
                            </td>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">: '.$hal_judul.'</div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Halaman Persembahan</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$hal_persembahan.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Kata Pengantar Dari Ahli/Pakar</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$kata_pengantar.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Prakata Dari Penulis</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$prakata.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Prolog</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$prolog.'</strong></div>
                            </td>
                        </tr>
                         <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Daftar Isi</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$daftar_isi.'</strong></div>
                            </td>
                        </tr> 
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Daftar Gambar</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$daftar_gambar.'</strong></div>
                            </td>
                        </tr> 
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Daftar Tabel</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$daftar_tabel.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Daftar Lampiran</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$daftar_lampiran.'</strong></div>
                            </td>
                        </tr>                      
                        </tbody>
                    </table>
                    <table width="700" cellspacing="0" cellpadding="5" style="border:1px solid #dee2e3">
                        <tbody>
                        <tr>
                            <td colspan="5" align="right" valign="top" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3;font-weight:bold;text-align:left"><div align="left">DETAIL KELENGKAPAN NASKAH (BAHAN ISI)</div></td>
                        </tr>
                        <tr>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">Pendahuluan</div>
                            </td>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">: '.$pendahuluan.'</div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Bagian (Topik utama yang terdiri atas beberapa bab)</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$bagian.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Bab</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$bab.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Subbab</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$subbab.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Gambar Termasuk Diagram</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$gambar.'</strong></div>
                            </td>
                        </tr>
                         <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Tabel (diberi no dan keterangan)</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$tabel.'</strong></div>
                            </td>
                        </tr> 
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Epilog</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$epilog.'</strong></div>
                            </td>
                        </tr> 
                        </tbody>
                    </table>
                    <table width="700" cellspacing="0" cellpadding="5" style="border:1px solid #dee2e3">
                        <tbody>
                        <tr>
                            <td colspan="5" align="right" valign="top" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3;font-weight:bold;text-align:left"><div align="left">DETAIL KELENGKAPAN NASKAH (BAHAN AKHIR)</div></td>
                        </tr>
                        <tr>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">Daftar Pustaka</div>
                            </td>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">: '.$daftar_pustaka.'</div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Biodata Singkat Penulis/Kontributor</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$biodata.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Daftar Istilah/Glosarium</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$daftar_istilah.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Daftar Singkatan dan Akronim</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$daftar_singkatan.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Lampiran (Jika Diperlukan)</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$lampiran.'</strong></div>
                            </td>
                        </tr>
                         <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Index (dibuat oleh penulis)</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$dex.'</strong></div>
                            </td>
                        </tr> 
                        </tbody>
                    </table>
                    <table width="700" cellspacing="0" cellpadding="5" style="border:1px solid #dee2e3">
                        <tbody>
                        <tr>
                            <td colspan="5" align="right" valign="top" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3;font-weight:bold;text-align:left"><div align="left">DETAIL KELENGKAPAN NASKAH (BAHAN SAMPUL)</div></td>
                        </tr>
                        <!--<tr>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">Blurb (Uraian singkat isi buku, sebagai perkenalan iklan</div>
                            </td>
                            <td width="50%" style="font-size:12px;font-family:Arial,Helvetica,sans-serif;background:#dceff5;font-weight:bold;text-align:center">
                                <div align="left">: '.$blu.'</div>
                            </td>
                        </tr>-->
                         <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Status Verifikasi</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$hasil.'</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left">Catatan</div>
                            </td>
                            <td valign="top" style="font-size:11px;font-family:Arial,Helvetica,sans-serif;border-bottom:1px solid #dee2e3">
                                <div align="left"><strong>: '.$catatan.'</strong></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p>Terima Kasih,<br><br>
                        <strong>Managing Editor ('.$namaEditor.' )</strong>
                      </p>
                </td>
            </tr>
            <tr>
                <td>
                    </td></tr><tr>
                <td>
                    <table align="center" width="700">
                        <tbody><tr>
                            <td>
                                <table align="center" width="300" border="0">
                                    <tbody><tr>
                                        <td>
                                            <table border="0" align="center" style="padding-top:5%">
                                                <tbody><tr>
                                                    <td width="60" height="35">
                                                        <a href="https://www.facebook.com/pages/LIPI-Press/597085693751515?fref=nf" title="LIPI Press" target="_blank"><img src="https://ci3.googleusercontent.com/proxy/Nm0lu0UTuIJF65grVFF-ft8OFw0mZMot6D-QLRCxbDED2wk5md-O1GjF4ddQLSByQkv6q_CvsQ9Fjl3v2y_zyXizW-shyg4GqiNFdY90PGdJW4SvhEAD7OWdw_y11Wpkh_oP-vjkKg71sw-CVsfKTZnK0OfHOCvw2rxjcCilJDWZJjGv9sczwTE=s0-d-e1-ft#http://static.cdn.responsys.net/i5/responsysimages/lazada/contentlibrary/!footer700_2/footer-promo-sg/images/fb.jpg" width="36" height="36" alt="Facebook Funbizz Indonesia" class="CToWUd"></a>
                                                    </td>
                                                    <td width="60" height="35">
                                                        <a href="https://plus.google.com/106583475677034516008/about" title="LIPI Press" target="_blank"><img src="https://ci6.googleusercontent.com/proxy/fJLjQUHPGAenLxcpaqOZnNvyGA7N7x2prlTIlV_fZ8PsJQvJvXGo9R3lb3AXFqeZgKnsFavOWw2LFBzy4L5xYBVWjukrue6_J3yw-uadGP1pYIg8dxdgC7kOKzsc8JQJ0r9n2KjH4ir0gKA96qbnkvy13AP8kqjx_FqhRt0mOtRBfoXXJgwdsq6_Tk62=s0-d-e1-ft#http://static.cdn.responsys.net/i5/responsysimages/lazada/contentlibrary/!footer700_2/footer-promo-sg/images/google.jpg" width="36" height="36" alt="Google+ Funbizz Indonesia" class="CToWUd"></a>
                                                    </td>
                                                    <td width="60" height="35" style="padding:0px;margin:0px">
                                                        <a href="https://twitter.com/lipi_press" title="LIPI Press" target="_blank"><img src="https://ci6.googleusercontent.com/proxy/wBsYM28D2P-2dDebdSIuSsHPxNu3YDU1bgCNwIak7nJrd5Fah4q46Qbgp8udrXve70C4lekLnvHwI4qr0X2W8r2rXYVXd0VCRnPjctEjuy8ndKu-S7XbgS_n33_Z6GC_iqEQZZgSpuLkFEHbZpPTxWeh4-4F1iC8The3MJWmVT_cHYb4qACGPqG9Kp9OPw=s0-d-e1-ft#http://static.cdn.responsys.net/i5/responsysimages/lazada/contentlibrary/!footer700_2/footer-promo-sg/images/twitter.jpg" width="36" height="36" alt="Twitter Funbizz Indonesia" class="CToWUd"></a>
                                                    </td>
                                                    <!-- <td width="60" height="35" style="padding:0px;margin:0px">
                                                        <a href="#" title="Linkedin Funbizz Indonesia" target="_blank"><img src="https://ci6.googleusercontent.com/proxy/Q21XxdbcKLztCEavTlDpw6eYEZafU3JZeVcZuuhMUE0oSlnFoRq-CoKdL2QPdWxT14o-O2pkQxj_wIGk3SN3UQ7iUcKLALp-ymfyfruglZbXEfylivUzNp85o97V8gpAm38e2229u33mkAyKjXlvu-xz3R8KAHntL1ZmM6Es0orUIAk3wvTT406jfObIKOE=s0-d-e1-ft#http://static.cdn.responsys.net/i5/responsysimages/lazada/contentlibrary/!footer700_2/footer-promo-sg/images/linkedin.jpg" width="36" height="36" alt="Linkedin Funbizz Indonesia" class="CToWUd"></a>
                                                    </td> -->
                                                    <td width="60" height="35" style="padding:0px;margin:0px">
                                                        <a href="https://www.youtube.com/channel/UCr1ihEI566IJib9P-JjENSA" title="LIPI Press" target="_blank"><img src="https://ci4.googleusercontent.com/proxy/r3PcUuAUgBpuLIbrV2L-IBKZ6R0hXZj89HxkHsW33rH0YCB3A_EFKE3wZe1H8Mu_ZfTc6khL-l11S9vgVQ_g_IbPFKumdfZKSi8qecEVYRfuChVHWbqsDLmx1WR3S3AY14ti3xDn3hsFCW1OjShxsD11ndN1d_Kqfzap9I_mcVdKa07bOD9w7SvQomXqHQ=s0-d-e1-ft#http://static.cdn.responsys.net/i5/responsysimages/lazada/contentlibrary/!footer700_2/footer-promo-sg/images/youtube.jpg" width="36" height="36" alt="Youtube Funbizz Indonesia" class="CToWUd"></a>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
            <!-- <tr>
                <td width="auto" align="center" style="font-family:Calibri,sans-serif;font-size:16px">
                    <a href="#" style="color:#1a9bb8;text-decoration:none" target="_blank">Tentang Kami</a> |
                    <a href="#" style="color:#1a9bb8;text-decoration:none" target="_blank">Layanan Pelanggan</a> |
                    <a href="#" style="color:#1a9bb8;text-decoration:none" target="_blank">Kebijakan Privasi</a>
                </td>
            </tr> -->
            <tr>
                <td width="auto" height="30" style="text-align:center;font-size:10px;color:#919191">
                    <p>Jl. Gondangdia Lama (RP) Suroso, No. 39 Jakarta 10350 | Telp. (+62) 21 3140228 Fax. (+62) 21 3144591</p>
                </td>
            </tr>
            <tr>
                <td height="3" align="center" style="background-color:#004688"></td>
            </tr>
                
            
        </tbody></table>
    </td>
    <td width="50%">
    </td>
</tr>
</tbody>
</table>';
?>