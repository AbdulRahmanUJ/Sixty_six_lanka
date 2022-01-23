@extends('layouts.app')
@section('title','sixty six lanka (pvt)Ltd | Tracking')
@section('content')
    <section class="container tracking">
        <style>
            body{
                background: white;
            }
        </style>
        <body cz-shortcut-listen="true">
            <div id="page-wrap">
                <table width="100%">
                    <tbody><tr>
                        <td style="border: 0;  text-align: left" width="18%">
                            <div id="logo">
                                <img src="assets/uploads/1625682660_logo.png" alt="DEPRIXA PRO" width="190" height="39">                </div></td>
                        <td style="border: 0;  text-align: center" width="56%">
                            NIT: 800124570-87 <br>
                            Phone: 3193196868<br>
                            Email: noreply@deprixapro.site<br>
                            Street: 7801 NW 37th St. Doral – FL 33195 - 6503 - Miami-FL                </td>
                        <td style="border: 0;  text-align: center" width="48%">
                            <br><img src="https://barcode.tec-it.com/barcode.ashx?data=AWB88552316654714&amp;code=Code128&amp;multiplebarcodes=false&amp;translate-esc=false&amp;unit=Fit&amp;dpi=72&amp;imagetype=Gif&amp;rotation=0&amp;color=%23000000&amp;bgcolor=%23ffffff&amp;qunit=Mm&amp;quiet=0&amp;modulewidth=50" alt="">
                        </td>

            </tr>
            </tbody></table>
            <hr>
            <br>
            <div id="customer">

                <table id="meta">
                    <tbody><tr>
                        <td rowspan="5" style="border: 1px solid white; border-right: 1px solid black; text-align: left" width="62%">
                            <strong>Bill to</strong> <br>
                            <b>SAULPOOL DIO</b><br><br>
                                Rua dos Indas <br>
                                Brasil | Indaiatuba <br>
                                +13043456677 <br>
                                demos@demos.com                    <table id="items">
                                 </table>
                        </td>
                        <td class="meta-head">
                            <p style="color:white;">Pay Mode</p>
                        </td>
                        <td>
                            Cash                </td>
                    </tr>
                    <tr>
                        <td class="meta-head">
                            <p style="color:white;">Courier Company</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="meta-head">
                            <p style="color:white;">Shipping date</p>
                        </td>
                        <td>2021-10-28 :04:09 AM</td>
                    </tr>
                    <tr>
                        <td class="meta-head">
                            <p style="color:white;">Invoice No..</p>
                        </td>
                        <td><b>AWB88552316654714</b></td>
                    </tr>
                </tbody></table>
            </div>
            <table id="items">
                <tbody><tr>
                    <th style="color:white;" width="5%"><b>Quantity</b></th>
                    <th style="color:white;" width="30%"><b>Description</b></th>
                    <th style="color:white;" width="25%"><b>Category</b></th>
                    <th style="color:white;" width="10%"><b>Weight (lb)</b></th>
                    <th style="color:white;" width="10%"><b>Length (cm)</b></th>
                    <th style="color:white;" width="10%"><b>Width (cm)</b></th>
                    <th style="color:white;" width="10%"><b>Height (cm)</b></th>
                    <th style="color:white;" width="10%"><b>Weight vol. (lb)</b></th>
                    <th style="color:white;" width="10%"><b>Declared value</b></th>
                </tr>


                    <tr class="item-row">
                        <td>4.00</td>
                        <td>asadsa</td>
                        <td>Bags &amp; Luggages</td>
                        <td>5</td>
                        <td>9</td>
                        <td>7</td>
                        <td>7</td>
                        <td>0.0882</td>
                        <td>66</td>

                    </tr>


                <tr class="">
                    <td colspan="2"><b>Price Lb:</b> </td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td colspan="3" class="text-right"><b>Subtotal</b></td>
                    <td class="text-center">0.00</td>

                </tr>

                <tr class="">
                    <td colspan="2"></td>
                    <td></td>
                    <td></td>
                    <td></td>


                    <td colspan="3" class="text-right"><b><b>Discount  % </b></b></td>
                    <td class="text-center">0</td>

                </tr>
                <tr>
                    <td colspan="2"><b>Total pounds weight:</b> <span id="total_libras">5.00</span></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td colspan="3" class="text-right"><b>Shipping insurance  % </b></td>
                    <td class="text-center" id="insurance">0.00</td>

                </tr>

                <tr>
                    <td colspan="2"><b>Total volumetric weight:</b> <span id="total_volumetrico">0.00</span></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="3" class="text-right"> <b>Customs tariffs  %</b></td>
                    <td class="text-center" id="total_impuesto_aduanero">0.00</td>


                </tr>

                <tr>
                    <td colspan="2"><b>Total weight calculation</b>: <span id="total_peso">5.00</span></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td colspan="3" class="text-right"><b>Tax  % </b></td>
                    <td class="text-center" id="impuesto">0.00</td>

                </tr>


                <tr>
                    <td colspan="2"><b>Total declared value:</b> <span id="total_peso">66.00</span></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td colspan="3" class="text-right"><b>Declared tax 0 % </b></td>
                    <td class="text-center" id="impuesto">0.00</td>

                </tr>



                <tr>
                    <td colspan="2"></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td colspan="3" class="text-right"><b>Re expedition</b></td>
                    <td class="text-center" id="impuesto"></td>

                </tr>

                <tr>
                    <td colspan="2"></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td colspan="3" class="text-right"><b>COURIER FEE &nbsp; USD</b></td>
                    <td class="text-center" id="total_envio">0.00</td>


                </tr>



            </tbody></table>



            <!--    end related transactions -->

            <div id="terms">
                <h5>TERMS</h5>
                <p align="justify">ACCEPTED: This Invoice is a title value in accordance with the provisions of art. 3 of law 1231 of July 17/08. The signature by third parties in representation, mandate or other quality on behalf of the buyer implies its obligation in accordance with art. 640 of the commercial code.</p><table id="related_transactions" style="width: 100%">

                </table>
                <br><br><br><br>
                <table id="signing">
                    <tbody><tr class="noBorder">
                        <td align="center">
                            <h4></h4>
                        </td>
                        <td align="center">
                            <h4></h4>
                        </td>
                    </tr>
                    <tr class="noBorder">
                        <td align="center">COMPANY SIGNATURE</td>
                        <td align="center">SIGNATURE / SEAL WHO RECEIVES</td>
                    </tr>
                </tbody></table>
            </div>

            <button class="button -dark center no-print" onclick="window.print();" style="font-size:16px">Print Invoice&nbsp;&nbsp; <i class="fa fa-print"></i></button>
            </div>



        </body>
    </section>
@endsection
