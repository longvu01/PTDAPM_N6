import { AJAX } from './helper';

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

var iPrice = $$('.iprice');
var iTitle = $$('.ititle');
var iQuantity = $$('.iquantity');
var iTotal = $$('.itotal');
var gTotalTemp = $('#gtotal_temp');
var gTotal = $('#gtotal');
/*  */
var decBtn = $$('#decBtn');
var incBtn = $$('#incBtn');
/*  */

const update = async function (data, url = '../process/cart/cart_update.php') {
  try {
    await AJAX(url, data);
  } catch (err) {
    // console.log(err);
  }
};

function subTotal(reAssign = true) {
  var iPriceLength = iPrice.length;
  var gtTemp = 0;
  for (let i = 0; i < iPriceLength; ++i) {
    if (reAssign) {
      decBtn[i].onclick = function () {
        if (iQuantity[i].value < 2) return;
        iQuantity[i].value--;

        update({ change_qnt: iQuantity[i].value, title: iTitle[i].value });
        subTotal(false);
      };
      incBtn[i].onclick = function () {
        if (iQuantity[i].value > 9) return;
        iQuantity[i].value++;

        update({ change_qnt: iQuantity[i].value, title: iTitle[i].value });
        subTotal(false);
      };
    }

    var priceValue = parseFloat(iPrice[i].value);
    iTotal[i].innerHTML =
      (priceValue * iQuantity[i].value).toLocaleString('da-DK') + ' đ';
    gtTemp += priceValue * iQuantity[i].value;
  }
  gTotalTemp.innerHTML = gtTemp.toLocaleString('da-DK') + ' đ';
  gTotal.innerHTML = gtTemp.toLocaleString('da-DK') + ' đ';
}

subTotal();

for (let item of iQuantity) {
  item.onchange = function () {
    this.form.submit();
  };
}
