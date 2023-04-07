
var mySelect = document.getElementById("room-type-select");
mySelect.selectedIndex = 0;

var getPrice = document.getElementById("getprice");
getPrice.onclick = function(){
  var numVal1 = Number(document.getElementById("payable-amount").value);
  var numVal = Number(document.getElementById("discount-amount").value);
  var numVal2 = Number(numVal) / 100;

  var totalValue = numVal1 - (numVal1 * numVal2);
  document.getElementById("payable-amount").value = totalValue.toFixed(2);
  document.getElementById("discount-amount-display").value = (numVal1 * numVal2).toFixed(2);
}


function dateDiffInDays(checkinDate, checkoutDate) {
  const oneDay = 1000 * 60 * 60 * 24; // milliseconds in one day
  const checkinTime = new Date(checkinDate).setHours(0, 0, 0, 0);
  const checkoutTime = new Date(checkoutDate).setHours(0, 0, 0, 0);
  const diffInMs = checkoutTime - checkinTime;
  return Math.round(diffInMs / oneDay);
}

function calculatePrice(input) {
  var room_id = input.parentNode.querySelector('#room-type-select').value.split(' - ');
  var price = parseFloat(room_id[1]);
  var gst = parseFloat(room_id[2]);
  var no_rooms = parseFloat(input.value);
  var total_price = price * no_rooms;
  var total_gst = gst * no_rooms;
  input.parentNode.querySelector('[name="no_room_input"]').value = total_price;
  input.parentNode.querySelector('[name="no_room_gst"]').value = total_gst;

  var total_cost = 0;
  var total_gst_amount = 0;
  var no_room_inputs = document.getElementsByName("no_room_input");
  var no_room_gsts = document.getElementsByName("no_room_gst");
  for (var i = 0; i < no_room_inputs.length; i++) {
    var input_value = parseFloat(no_room_inputs[i].value);
    if (!isNaN(input_value)) {
      total_cost += input_value;
    }
    var gst_value = parseFloat(no_room_gsts[i].value);
    if (!isNaN(gst_value)) {
      total_gst_amount += gst_value;
    }
  }
  document.getElementById("cost").value = total_cost;
  document.getElementById("gst").value = total_gst_amount;

  const checkinDate = new Date(document.getElementById("checkin_date").value);
  const checkoutDate = new Date(document.getElementById("checkout_date").value);
  const diffInDays = dateDiffInDays(checkinDate, checkoutDate);

  document.getElementById("payable-amount").value = (total_cost + total_gst_amount) * diffInDays;
}


var rooms = [
  {'name': 'Standard Room', 'gst': 120, 'price': 1000},
  {'name': 'Executive Suite Room', 'gst': 335.4, 'price': 2000},
  {'name': 'Deluxe Room', 'gst': 600, 'price': 1500},
  {'name': 'Mixed Room', 'gst': 120, 'price': 1500}
];

var applyCode = document.getElementById("add-room-link");
applyCode.onclick = function(){
  var html = '';
  rooms.forEach(function(room) {
    html += '<option value="' + room.name + ' - ' + room.price + ' - ' + room.gst + '">' + room.name + ' - ' + room.price + ' - ' + room.gst + '</option>';
  });

  document.getElementById("add-me").insertAdjacentHTML("afterend",
      `<div class="form-inline" id="add-me">
          <select id="room-type-select" name="room_type_2" class="form-select form-control col-md-4" >
          <option value="">Select a room type</option>    
          ` + html + `
          </select>
          <input type="number" value="0" class="form-control mb-2 m-sm-2 col-md-4" name="no_room_2"  onchange="calculatePrice(this)">
          <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_input" hidden>
          <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_gst" hidden>
      </div>
      <div class="form-inline" id="add-me">
          <select id="room-type-select" name="room_type_3" class="form-select form-control col-md-4" >
          <option value="">Select a room type</option>  
          ` + html + `
          </select>
          <input type="number" value="0" class="form-control mb-2 m-sm-2 col-md-4" name="no_room_3"  onchange="calculatePrice(this)">
          <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_input" hidden>
          <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_gst" hidden>
      </div>
      <div class="form-inline" id="add-me">
          <select id="room-type-select" name="room_type_4" class="form-select form-control col-md-4" >
          <option value="">Select a room type</option>  
          ` + html + `
          </select>
          <input type="number" value="0" class="form-control mb-2 m-sm-2 col-md-4" name="no_room_4"  onchange="calculatePrice(this)">
          <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_input" hidden>
          <input type="text" class="form-control mb-2 mr-sm-2 col-md-1 " name="no_room_gst" hidden>
      </div>
      `);
}