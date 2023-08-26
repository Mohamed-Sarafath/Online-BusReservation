<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <link rel="stylesheet" href="../css/print.css">
    <style>
        * {
            border: 0;
            box-sizing: content-box;
            text-decoration: none;
            vertical-align: top;
        }

        /* heading */
        h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */
        table {
            font-size: 75%;
            width: 100%;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            text-align: left;
            border-radius: 0.25em;
            border-style: solid;
        }

     

        th {
            background: #EEE;
            border-color: #BBB;
            font-weight: bold;
        }

        td {
            border-color: #DDD;
        }

        /* page */
        html {
            font: 16px 'Open Sans', sans-serif;
            overflow: auto;
            padding: 0.5in;
            background: #999;
            cursor: default;
        }


        body {
            box-sizing: border-box;

            /* page height */
            height: 11in;
            
            /* to center all elements */
            margin: 0 auto;
            
            overflow: hidden;
            padding: 0.5in;
            width: 8.5in;
            background: #FFF;
            border-radius: 1px;

            /* to get shadow around box  */
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);  
        }


        /* header */

        header {
            margin: 0 0 5em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        /* invoice h1 black backround color */
        header h1 {
            background: #000;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        header address p {
            margin: 0 0 0.25em;
        }

        header span,
        header img {
            /* display: block; */
            float: right;
        }

        header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative;
        }

        header img {
            max-height: 100%;
            max-width: 100%;
        }


        /* article */
        article,
        article address,
        table.meta,
        table.inventory {

            /* top, ryt/left, bottom  */
            margin: 0 0 3rem;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article h1 {
            clip: rect(0 0 0 0);
            position: absolute;
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: bold;
        }


       
        /* table balance 50 50  */
        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: right;
        }


        /* print logo */
        .prlogo {
            height: 90px;
            width: 200px;
            margin-bottom: 30;
        }
    </style>

</head>

<body>


    <?php
    include('../src./database.php');
    $sql = "select * from payment";
    $re = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($re)) 
    {

        $id = $row['pid'];
        $bno = $row['bno'];
        $name = $row['name'];
        $depart = $row['depart'];
        $arrive = $row['arrive'];
        $tamnt = $row['tamnt'];


        $sql1 = "select date from buses where b_no='$bno'";
        $re2 = mysqli_query($con, $sql1);
        while ($row2 = mysqli_fetch_array($re2)) { //buses
            $date=$row2['date'];
            
        }
       
    }
    ?>
    <header>
        <h1>Invoice</h1>
        <address>
            <p>HopON ,</p>
            <p>Old Market Road,<br>Sainthamaruthu-01,<br>Sri Lanka.</p>
            <p>(+94) 765 760 556</p>
        </address>
        <span><img style="background-color:black; " class="prlogo" alt="" src="../images/sar.png"></span>
    </header>

    <article>
        <h1>Customer Name</h1>
        <address>
            <p>
                <?php echo $name ?> <br>
            </p>
        </address>
        <table class="meta">
            <tr>
                <th><span>Invoice #</span></th>
                <td><span>
                        <?php echo $id; ?>
                    </span></td>
            </tr>
            <tr>
                <th><span>Date</span></th>
                <td><span>
                        <?php echo $date; ?>
                    </span></td>
            </tr>

        </table>
        <table class="inventory">
            <thead>
                <tr>
                    
                    <th><span>From</span></th>
                    <th><span>To</span></th>
                    <th><span>Total Amount</span></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span>
                            <?php echo $depart; ?>
                        </span></td>
                    <td><span>
                            <?php echo $arrive; ?>
                        </span></td>
                    <td><span data-prefix>Rs.</span><span>
                            <?php echo $tamnt; ?>
                        </span></td>
                </tr>
            </tbody>
        </table>

        <table class="balance">
            <tr>
                <th><span>Total</span></th>
                <td><span data-prefix>Rs.</span><span>
                        <?php echo $tamnt; ?>
                    </span></td>
            </tr>
            <tr>
                <th><span>Amount Paid</span></th>
                <td><span data-prefix>Rs.</span><span><?php echo $tamnt; ?></span></td>
            </tr>
            <tr>
                <th><span>Balance Due</span></th>
                <td><span data-prefix>Rs.</span><span>
                            0.00
                    </span></td>
            </tr>
        </table>
    </article>
   
        <h1><span>Contact us</span></h1>
        <div>
            <p align="center">Email :- HopOn@gmail.com || Web :- www.HopOn.lk || Phone :- +94 765 760 556 </p>
        </div>

        <br>
        <br>
        <br>
    <center>
    <div >

    
    <button onclick="window.print();" class="print-btn">Print</button>
      </div>
    </center>
</body>

</html>