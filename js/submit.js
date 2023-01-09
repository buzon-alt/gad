
  function addPricelist(){
    var productName = document.getElementById('productName').value;
    var productPrice = document.getElementById('productPrice').value;

    var xmlhttp = new XMLHttpRequest();
     xmlhttp.open("GET","../php/addProduct.php?productName="+productName+"&productPrice="+productPrice,false);
     xmlhttp.send(null);
     var notify =xmlhttp.responseText;
     notify = notify.trim();

     if (notify == "success") {
       alert('New product has been added!');
       location.reload();
     }
  }

  function editPricelist(){
    var productId = document.getElementById('productId').value;
    var productName = document.getElementById('editproductName').value;
    var productPrice = document.getElementById('editproductPrice').value;

    var xmlhttp = new XMLHttpRequest();
     xmlhttp.open("GET","../php/editProduct.php?productName="+productName+"&productPrice="+productPrice+"&id="+productId,false);
     xmlhttp.send(null);
     var notify =xmlhttp.responseText;
     notify = notify.trim();

     if (notify == "success") {
       alert('Product has been updated!');
       location.reload();
     }
  }

  function editProduct(e){
    var productName = document.getElementById('product'+e).innerHTML;
    var productPrice = document.getElementById('price'+e).value;

    document.getElementById('productId').value = e;
    document.getElementById('editproductName').value = productName;
    document.getElementById('editproductPrice').value = productPrice;
    $("#editProduct").modal("show");

  }

  function addSupplies(){
    var itemNumber = document.getElementById('itemNumber').value;
    var suppliesCatergory = document.getElementById('suppliesCatergory').value;
    var suppliesDesc = document.getElementById('suppliesDesc').value;
    var suppliesNeed = document.getElementById('suppliesNeed').value;
    var suppliesPrice = document.getElementById('suppliesPrice').value;
    var suppliesUnit = document.getElementById('suppliesUnit').value;
    var suppliesSupplier = document.getElementById('suppliesSupplier').value;

    var xmlhttp = new XMLHttpRequest();
     xmlhttp.open("GET","../php/addSupplies.php?suppliesCatergory="+suppliesCatergory+"&suppliesDesc="+suppliesDesc+"&suppliesNeed="+suppliesNeed+"&suppliesPrice="+suppliesPrice+"&itemNumber="+itemNumber+"&suppliesUnit="+suppliesUnit+"&suppliesSupplier="+suppliesSupplier,false);
     xmlhttp.send(null);
     var notify =xmlhttp.responseText;
     notify = notify.trim();

     if (notify == "success") {
       alert('New supplies has been added!');
       location.reload();
     }
  }

  function editSupply(e){
    var suppliesCatergory = document.getElementById('category'+e).innerHTML;
    var suppliesDesc = document.getElementById('desc'+e).innerHTML;
    var suppliesNeed = document.getElementById('need'+e).innerHTML;
    var suppliesPrice = document.getElementById('price'+e).value;
    var suppliesUnit = document.getElementById('unit'+e).innerHTML;
    var suppliesSupplier = document.getElementById('supplier'+e).innerHTML;

    document.getElementById('idSupplies').value = e;
    document.getElementById('editsuppliesCatergory').value = suppliesCatergory;
    document.getElementById('editsuppliesDesc').value = suppliesDesc;
    document.getElementById('editsuppliesNeed').value = suppliesNeed;
    document.getElementById('editsuppliesPrice').value = suppliesPrice;
    document.getElementById('editsuppliesUnit').value = suppliesUnit;
    document.getElementById('editsuppliesSupplier').value = suppliesSupplier;
    $("#editSupplies").modal("show");

  }

  function editSupplies(){
    var idSupplies = document.getElementById('idSupplies').value;
    var suppliesCatergory = document.getElementById('editsuppliesCatergory').value;
    var suppliesDesc = document.getElementById('editsuppliesDesc').value;
    var suppliesNeed = document.getElementById('editsuppliesNeed').value;
    var suppliesPrice = document.getElementById('editsuppliesPrice').value;
    var suppliesUnit = document.getElementById('editsuppliesUnit').value;
    var suppliesSupplier = document.getElementById('editsuppliesSupplier').value;

    var xmlhttp = new XMLHttpRequest();
     xmlhttp.open("GET","../php/editSupplies.php?suppliesCatergory="+suppliesCatergory+"&suppliesDesc="+suppliesDesc+"&suppliesNeed="+suppliesNeed+"&suppliesPrice="+suppliesPrice+"&idSupplies="+idSupplies+"&suppliesUnit="+suppliesUnit+"&suppliesSupplier="+suppliesSupplier,false);
     xmlhttp.send(null);
     var notify =xmlhttp.responseText;
     notify = notify.trim();

     if (notify == "success") {
       alert('Supplies has been updated!');
       location.reload();
     }
  }
