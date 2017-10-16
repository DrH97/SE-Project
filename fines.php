<?php
@include_once 'layout/navbar.php';
 ?>

<div style="border-bottom: 1px solid #857D7A">
    <h1>Library Fines</h1>
</div>
<div>
    <h4><i>NOTE: Fines are charged 5/= per day due deadline date.</i></h4><br>
    <p>Name: <input type="text"></p>
    <p>Adm No: <input type="text"></p>
    <p>Book: <input type="text"></p><br>
    <p>Borrowing Date: <input type="date"></p>
    <p>Deadline Date: <input type="date" id="deadline_date" onchange="cal()"></p>
    <p>Returning Date: <input type="date" id="return_date" onchange="cal()"></p>
</div><br>
<div>
    <p>Due days:  <input type="text" id="numdays2" placeholder="Return date - Deadline date"></p>
    <p>Fine charged: <input type="text" id="fine" placeholder="Due days * 5/="></p>
</div><br><br><br>
<script type="text/javascript">
    function GetDays(){
        var rtndt = new Date(document.getElementById("return_date").value);
        var ddlndt = new Date(document.getElementById("deadline_date").value);
        return parseInt((rtndt-ddlndt)/(24*3600*1000));
    }
    function cal(){
        if(document.getElementById("return_date")){
            document.getElementById("numdays2").value=GetDays();
            document.getElementById("fine").value=(GetDays()*5+"/=");
        }
    }
</script>
