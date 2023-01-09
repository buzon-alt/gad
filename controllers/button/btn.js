
function btnNew(){
  location.reload();
}

function btnFind() {
    document.getElementById("viewTransaction").style.display = "block";
}

function closePopupsTRN() {
    document.getElementById("viewTransaction").style.display = "none";
}

function btnCustom(){
  window.open('customsize.php', 'Tarpaulin Size Calculator', 'toolbar=0,location=0,menubar=0,width=400,height=400,top=100,left=800');
}

function btnCustomer(){
    document.getElementById("addCustomer").style.display = "block";
}


function closePopupsAC(){
    document.getElementById("addCustomer").style.display = "none";
}

function btnVDesigner(){

    window.open("../admin/pages/inventorySupplies.php",'B94ADS CCS - SUPPLIES');
  //document.getElementById("viewDesigner").style.display = "block";
}

function closePopupsDL(){
    document.getElementById("viewDesigner").style.display = "none";
}

function btnVJobs(){
  window.open("../admin/pages/designerdashboard.php",'DESIGNER DASHBOARD');
      //document.getElementById("viewJobs").style.display = "block";
}
function closePopupsJO(){
      document.getElementById("viewJobs").style.display = "none";
      location.reload();
}

function btnRPayments(){
    var amountDue = document.getElementById('amountDue').value;
    var balanceAmount = document.getElementById('balanceAmount').value;
    var transAction = document.getElementById('transAction').value;
    if (transAction == "new") {
      if (amountDue != 0) {
          document.getElementById("rcvPayment").style.display = "block";
      }
    } else {
      if (amountDue != 0 && balanceAmount !=0) {
          document.getElementById("rcvPayment").style.display = "block";
      }
    }
}
    function closePopupsRP(){
        document.getElementById("rcvPayment").style.display = "none";
    }

    function receivedPayment(){
        document.getElementById("rcvPayment").style.display = "none";
    }

function btnSave(){

  var customer_name = document.getElementById('customer_name').value;
  var amountDue = document.getElementById('amountDue').value;
  var downPayment = document.getElementById('downPayment').value;
  var balanceAmount = document.getElementById('balanceAmount').value;

  var transactionNumber = document.getElementById('transactionNumber').value;
  var assignDesigner = document.getElementById('assignDesigner').value;

  var notes = escape(document.getElementById('notes').value);
  var tntvDate = document.getElementById('tntvDate').value;
  var tntvTime = document.getElementById('tntvTime').value;

  var modePayment = document.getElementById('modePayment').value;
  var checkNo = document.getElementById('checkNo').value;
  var checkDate = document.getElementById('checkDate').value;
  var bankName = document.getElementById('bankName').value;
  var receivedAmount = document.getElementById('receivedAmount').value;
  var transAction = document.getElementById('transAction').value;
  var disbalanceAmount = document.getElementById('disbalanceAmount').value;

  var rcv2ewt = document.getElementById('rcv2ewt').value;
  var rcv1ewt = document.getElementById('rcv1ewt').value;
  var rcv3ewt = document.getElementById('rcv3ewt').value;
 
  if (amountDue == 0) {
    alert("Make sure that you have valid transaction!");
  }else if(customer_name == ""){
    alert("Please fill up customer name!");
  }else{
          for (var i = 0; i < 20; i++) {
            var quantity = document.getElementById('quantity'+i).value;
            var unit = document.getElementById('unit'+i).value;
            var desc = document.getElementById('desc'+i).value;
            var price = document.getElementById('price'+i).value;
            var amount = document.getElementById('amount'+i).value;
            var transactionStatus = document.getElementById('stat'+i).value;

            if (amount != 0) {
              var xmlhttp = new XMLHttpRequest();
			   xmlhttp.open("GET","saveTransaction.php?transactionNumber="+transactionNumber+"&customer_name="+customer_name+"&quantity="+quantity+"&unit="+unit+"&desc="+desc+"&price="+price+"&amount="+amount+"&transactionStatus="+transactionStatus+"&assignDesigner="+assignDesigner+"&row="+i,false);
			   xmlhttp.send(null);
			   var notify =xmlhttp.responseText;
			   notify = notify.trim();
            }
          }

          if (notify == 'success') {
            var xmlhttp = new XMLHttpRequest();
			 xmlhttp.open("GET","saveJobs.php?transactionNumber="+transactionNumber+"&customer_name="+customer_name+"&assignDesigner="+assignDesigner+"&notes="+notes+"&amountDue="+amountDue+"&downPayment="+downPayment+"&balanceAmount="+balanceAmount+"&tntvDate="+tntvDate
			 +"&tntvTime="+tntvTime,false);
			 xmlhttp.send(null);
			 var notify =xmlhttp.responseText;
			 notify = notify.trim();
       alert(notify);
          }

          if (notify == 'success') {

            var xmlhttp = new XMLHttpRequest();
         xmlhttp.open("GET","savesales.php?transactionNumber="+transactionNumber+"&transactionStatus="+customer_name+"&modePayment="+modePayment+"&checkNo="+checkNo+"&checkDate="+checkDate+"&bankName="+bankName+"&receivedAmount="+receivedAmount+"&transAction="+transAction+"&disbalanceAmount="+disbalanceAmount+"&amountDue="+amountDue+"&rcv2ewt="+rcv2ewt+"&rcv1ewt="+rcv1ewt+"&rcv3ewt="+rcv3ewt,false);
         xmlhttp.send(null);
         var notify =xmlhttp.responseText;
         notify = notify.trim();
         $('#submitImg').click();
          }

      if (notify == "success") {
		    alert('Transaction save!');
        window.location.href = "?";
        window.open('printslip.php?trn='+transactionNumber, '_blank');
      }



  }

}


function btnSales(){
  window.open('salestoday.php', 'Today Sales', 'toolbar=0,location=0,menubar=0,width=800,height=600,top=40,left=50');
}



function btnCancel(){
  window.location.href="?";
}


function btnPrice(){
    window.open("../admin/pages/pricelist.php",'B94ADS CCS - PRODUCT PRICE LIST');
}

function selectDesigner(e){
  var designerName = document.getElementById('designerName'+e).innerHTML;
  document.getElementById('assignDesigner').value = designerName;
  document.getElementById('viewDesigner').style.display = 'none';
}

function addCustomer(){
  var customerName = document.getElementById('customerName').value;
  var company = document.getElementById('company').value;
  var contact = document.getElementById('contact').value;
  var address = document.getElementById('address').value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","addCustomer.php?customerName="+customerName+"&company="+company+"&contact="+contact+"&address="+address,false);
  xmlhttp.send(null);
  var notify =xmlhttp.responseText;
  notify = notify.trim();
  if (notify == "success") {
    document.getElementById('addCustomer').style.display = "none";
    $("#cutomerList").load('customerlist.php');
  }
}


$( "#receivedAmount" ).keydown(function() {
  var keyCode = event.keyCode;
   if (keyCode == 13) {  // 27 is the ESC key
         document.getElementById("rcvPayment").style.display = "none";
   }
});

$("body").keydown(function(){
  var keyCode = event.keyCode;
 if (keyCode == 117) {  // 27 is the ESC key
     alert ("You pressed the Escape key!");
 }
});


function searchJobs(){
  var jobsearchkey = document.getElementById('searchJobkey').value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","joborder.php?jobsearchkey="+jobsearchkey,false);
  xmlhttp.send(null);
  var notify =xmlhttp.responseText;
  notify = notify.trim();
  $("#joblist").html(notify);
}

function searchTrans(){
  var searchTrankey = document.getElementById('searchTrankey').value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","transorder.php?searchTrankey="+searchTrankey,false);
  xmlhttp.send(null);
  var notify =xmlhttp.responseText;
  notify = notify.trim();
  $("#translist").html(notify);
}

function cancel(e){
  var id = document.getElementById('id'+e).value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","canceljobs.php?id="+id,false);
  xmlhttp.send(null);
  var notify =xmlhttp.responseText;
  notify = notify.trim();
}

function approved(e){
  var id = document.getElementById('id'+e).value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","approvedjobs.php?id="+id,false);
  xmlhttp.send(null);
  var notify =xmlhttp.responseText;
  notify = notify.trim();
}


function override(){
  var transactionNumber = document.getElementById('transactionNumber').value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","override.php?trn="+transactionNumber,false);
  xmlhttp.send(null);
  var notify =xmlhttp.responseText;
  notify = notify.trim();
  alert("Override transaction request sent!");
}



function cancelTransaction(){
  var transactionNumber = document.getElementById('transactionNumber').value;
  if (confirm("Are you sure you want to this transaction # "+transactionNumber+"?") ) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","cancelTransaction.php?trn="+transactionNumber,false);
    xmlhttp.send(null);
    var notify =xmlhttp.responseText;
    notify = notify.trim();
    alert("Transaction # "+transactionNumber+" has been cancelled!");
  } else {
      //code here for don't leave (Cancel)
  }

}


function btnOR(){
  var amountDue = document.getElementById('amountDue').value;
  var customer_name = document.getElementById('customer_name').value;

  document.getElementById('orName').value = customer_name;
  document.getElementById('orAmount').value = amountDue;
  document.getElementById('forOR').style.display = "block";
}

function closePopupsOR(){
  document.getElementById('forOR').style.display = "none";
}

function submitOR(){
  var transactionNumber = document.getElementById('transactionNumber').value;
  var orDate = document.getElementById('orDate').value;
  var orName = document.getElementById('orName').value;
  var orNumber = document.getElementById('orNumber').value;
  var orAmount = document.getElementById('orAmount').value;
  var orTrading = document.getElementById('orTrading').value;
  var or2ewt = document.getElementById('or2ewt').value;
  var or1ewt = document.getElementById('or1ewt').value;
  var or3ewt = document.getElementById('or3ewt').value;

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","addOR.php?transactionNumber="+transactionNumber+"&orDate="+orDate+"&orName="+orName+"&orNumber="+orNumber+"&orAmount="+orAmount+"&orTrading="+orTrading+"&or2ewt="+or2ewt+"&or1ewt="+or1ewt+"&or3ewt="+or3ewt,false);
  xmlhttp.send(null);
  var notify =xmlhttp.responseText;
  notify = notify.trim();
  if (notify == "success") {
    alert("Sales w/OR has been recorded!");
    document.getElementById('forOR').style.display = "none";
    document.getElementById('orDate').value = "";
    document.getElementById('orName').value = "";
    document.getElementById('orNumber').value = "";
    document.getElementById('orAmount').value = "";
    document.getElementById('orTrading').value = "";
    document.getElementById('or2ewt').value = "";
    document.getElementById('or1ewt').value = "";
    document.getElementById('or3ewt').value = "";
  }else {
    alert(notify);
  }
}
