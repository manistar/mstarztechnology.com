var payBtn = document.getElementById("payBtn");
var payment_info = {
    public_key: "FLWPUBK-6eb3185d35019de46b7cea7571af31af-X",
    tx_ref: "",
    amount: 0,
    currency: "NGN",
    payment_options: "card, account, banktransfer, ussd",
    redirect_url: "index?p=payment",
    meta: {
        consumer_id: "",
    },
    customer: {
        email: "",
        phone_number: "",
        name: "",
    },
    customizations: {
        title: "",
        description: "",
        logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
    },
};


payBtn.addEventListener("click", function(e){
    // getpayment info through ajax
    // data = { page: what, what: what, start: start };
    request = $.ajax({
      type: "POST",
      url: "passer",
      data: {newpayment: ""},
    });
  
    request.done(function (response) {
        if(response) {
           var data = JSON.parse(response);
           console.log(data);
           if(data.status == "error") {

           }else{
            data = data['data'];
            payment_info["tx_ref"]=data['ref'];
            payment_info["amount"]=data['price'];
            payment_info["meta"]["consumer_id"]=data['userID'];
            payment_info["customer"]["email"]=data['email'];
            payment_info["customer"]["phone_number"]=data['phone_number'];
            payment_info["customer"]["name"]=data['fullname'];
            payment_info["customizations"]["title"]=data['title'];
            payment_info["customizations"]["description"]=data['description'];
            console.log(payment_info);
            FlutterwaveCheckout(payment_info);
           }
        }
    });
});

