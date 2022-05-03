const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

var iPrice = $$('.iprice');
var iQuantity = $$('.iquantity');
var iTotal = $$('.itotal');
var gTotalTemp = $('#gtotal_temp');
var gTotal = $('#gtotal');
/*  */
var decBtn = $$('#decBtn');
var incBtn = $$('#incBtn');
/*  */

function subTotal() {
  var iPriceLength = iPrice.length;
  var gtTemp = 0;
  for (let i = 0; i < iPriceLength; ++i) {
    decBtn[i].onclick = function () {
      if (iQuantity[i].value < 2) return;
      iQuantity[i].value--;
      subTotal();
    };
    incBtn[i].onclick = function () {
      if (iQuantity[i].value > 9) return;
      iQuantity[i].value++;
      subTotal();
    };

    var priceValue = parseFloat(iPrice[i].value);
    iTotal[i].innerHTML =
      (priceValue * iQuantity[i].value).toLocaleString('da-DK') + ' đ';
    gtTemp += priceValue * iQuantity[i].value;
  }
  gTotalTemp.innerHTML = gtTemp.toLocaleString('da-DK') + ' đ';
  gTotal.innerHTML = gtTemp.toLocaleString('da-DK') + ' đ';
}
subTotal();
for (item of iQuantity) {
  item.onchange = function () {
    this.form.submit();
  };
}
